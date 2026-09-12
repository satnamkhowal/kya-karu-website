<?php
require __DIR__ . '/_auth.php'; require_admin();
$config = __DIR__ . '/../config/database.php'; if (!file_exists($config)) { exit('Run the installer first.'); } require $config;
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verify_csrf($_POST['csrf'] ?? null)) { http_response_code(403); exit('Invalid request.'); }
$stages = ['New', 'Contacted', 'Qualified', 'Counselling Scheduled', 'Application Started', 'Documents Pending', 'Applied', 'Admission Confirmed', 'Not Interested', 'Follow Up Later'];
$id = (int) ($_POST['id'] ?? 0); $status = trim($_POST['status'] ?? ''); $note = trim($_POST['note'] ?? '');
if (!$id || !in_array($status, $stages, true)) { http_response_code(422); exit('Invalid lead or stage.'); }
db()->beginTransaction();
try { $stmt = db()->prepare('UPDATE leads SET status = ?, updated_at = NOW() WHERE id = ?'); $stmt->execute([$status, $id]); if ($note !== '') { $activity = db()->prepare('INSERT INTO lead_activities (lead_id, activity_type, note, created_at) VALUES (?, ?, ?, NOW())'); $activity->execute([$id, 'Stage update', $note]); } db()->commit(); } catch (Throwable $e) { db()->rollBack(); throw $e; }
header('Location: leads.php?updated=1'); exit;
