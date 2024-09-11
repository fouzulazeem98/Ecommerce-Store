<?php
session_destroy();
echo "
                <script>
                    location.assign('../sign_in.php')
                </script>
     ";
