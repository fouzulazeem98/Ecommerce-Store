<?php
session_start();
session_destroy();
echo "
        <script>
            location.assign('sign_in.php')
        </script>
     ";
