<?php
// دریافت شناسه مقاله از آدرس (URL) با پشتیبانی از مقدار پیش‌فرض
$artikelId = $_GET['id'] ?? 1;

try {
    $dbConnector = new PDOConnector();
    $pdo = $dbConnector->getConnection();

    // کوئری برای استخراج کامنت‌ها با استفاده از جداول مرتبط
    $sql = "SELECT ko.Name, k.Kommentar, k.Datum 
            FROM Kommentare k
            JOIN kommentierende ko ON k.KommentierendeID = ko.KommentierendeID
            JOIN Kommentare_Artikel ka ON k.KommentarID = ka.KommentarID
            WHERE ka.ArtikelID = ? 
            ORDER BY k.Datum DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$artikelId]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $result = [];
}
?>

<div class="mt-4 mb-5">
    <h4>Bisherige Kommentare:</h4>
    <?php if (empty($result)): ?>
        <p class="text-muted">Noch keine Kommentare vorhanden. Schreibe den ersten!</p>
    <?php else: ?>
        <?php foreach ($result as $kommentar): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title fs-6 fw-bold"><?= htmlspecialchars($kommentar['Name']) ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted fs-7"><?= date('d.m.Y', strtotime($kommentar['Datum'])) ?></h6>
                    <p class="card-text"><?= nl2br(htmlspecialchars($kommentar['Kommentar'])) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>