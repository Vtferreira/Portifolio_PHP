<?php

header("HTTP/1.1 303 See other");
header("Location: http://$_SERVER[HTTP_HOST]/blog/");
