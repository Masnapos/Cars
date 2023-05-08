<?php
header('Content-Type: text/event-stream');
// Specify that the page should not cache:
header('Cache-Control: no-cache');
$time = date('r');
// Output the data to send (Always start with "data: "):
echo "data: The server time is: {$time}\n\n";
// Flush the output data back to the web page:
flush();
?>