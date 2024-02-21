<?php

umask(0002); // This will let the permissions be 0775

use App\Kernel;



require_once dirname(__DIR__).'/vendor/autoload_runtime.php';
require('vendor/autoload.php');

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);



    /*if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
        Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
    }

    $trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false;
    $trustedProxies = $trustedProxies ? explode(',', $trustedProxies) : [];
    if($_SERVER['APP_ENV'] == 'prod') $trustedProxies[] = $_SERVER['REMOTE_ADDR'];
    if($trustedProxies) {
        Request::setTrustedProxies($trustedProxies, Request::HEADER_X_FORWARDED_AWS_ELB);
    }*/

};


$s3 = new Aws\S3\S3Client([
    'version'  => '2006-03-01',
    'region'   => 'Europe (Stockholm)',
]);
$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
<h1>S3 upload example</h1>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile']) && $_FILES['userfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
    // FIXME: you should add more of your own validation here, e.g. using ext/fileinfo
    try {
        // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that you then store in your database, or similar
        $upload = $s3->upload($bucket, $_FILES['userfile']['name'], fopen($_FILES['userfile']['tmp_name'], 'rb'), 'public-read');
        ?>
        <p>Upload <a href="<?=htmlspecialchars($upload->get('ObjectURL'))?>">successful</a> :)</p>
    <?php } catch(Exception $e) { ?>
        <p>Upload error :(</p>
    <?php } } ?>
<h2>Upload a file</h2>
<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <input name="userfile" type="file"><input type="submit" value="Upload">
</form>
</body>
</html>

#$_SERVER['HTTP_X_FORWARDED_PROTO'] = $_SERVER['HTTP_CUSTOM_FORWARDED_PROTO'];

//$response = $kernel->handle($request);

