<!-- ################   Main Navigation   ################ -->
<nav>
    <a class = "<?php
    if ($pathParts['filename'] == "index"){
        print 'activePage';
    }
    ?>" href="index.php">Home</a>

    <a class = "<?php
    if ($pathParts['filename'] == "detail"){
        print 'activePage';
    }
    ?>" href="detail.php">Portfolio</a>

    <a  class = "<?php
    if ($pathParts['filename'] == "array"){
        print 'activePage';
    }
    ?>" href="array.php">About</a>
    
    <a  class = "<?php
    if ($pathParts['filename'] == "form"){
        print 'activePage';
    }
    ?>" href="form.php">Contact</a>
</nav>