<?php
include 'top.php';

$whatInquiry = array('taken', 'learn', 'reccomend', 'other');

// establish variables
$validData = false;
$errorMessage = '';
$message = '';

$inquiry = '';
$interest = '';
$name = '';
$email = '';
$photo = '';
$portrait = 0;
$music = 0;
$sports = 0;
$other = 0;

function getData($field){
    if (!isset($_POST[$field])){
        $data = "";
    }
    else{
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    // Check for letters, numbers and dash, period, space and single quote only.
    // added & ; and # as a single quote sanitized with html entities will have 
    // this in it bob's will be come bob's
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;
    $inquiry = getData('ddlInquiry');
    $interest = getData('txtInterest');
    $name = getData('txtName');
    $email = getData('txtEmail');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $photo = getData('radPhoto');
    $portrait = (int) getData('chkPortrait');
    $music = (int) getData('chkMusic');
    $sports = (int) getData('chkSports');
    $other = (int) getData('chkOther');


    print PHP_EOL . '<!-- Starting Validation -->' . PHP_EOL;
    
    $validData = true;
    // check if inquiry class is valid
    if($inquiry == ''){
        $errorMessage .= '<p class="mistake">Please choose a valid option. This is not a proper inquiry.</p>';
        $validData = false;
    }
    elseif(!in_array($inquiry, $whatInquiry)){
        $errorMessage .= '<p class="mistake">Please choose a valid option.</p>';
        $validData = false;
    }

    // check if interest is valid
    if($interest == ''){
        $errorMessage .= '<p class="mistake">Please tell us what your interest is.</p>';
        $validData = false;
    }
    elseif(!verifyAlphaNum($interest)){
        $errorMessage .= '<p class="mistake">Your interest contains invalid characters. Please use only letters.</p>';
        $validData = false;
    }

    // check if name is valid
    if($name == ''){
        $errorMessage .= '<p class="mistake">Please type your name.</p>';
        $validData = false;
    }
    elseif(!verifyAlphaNum($name)){
        $errorMessage .= '<p class="mistake">Your name contains invalid characters. Please use only letters.</p>';
        $validData = false;
    }

    // check if email is valid
    if($email == ''){
        $errorMessage .= '<p class="mistake">Please type your email.</p>';
        $validData = false; 
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMessage .= '<p class="mistake">Your email contains invalid characters. Please use only letters.</p>';
        $validData = false;
    }

    //check if photo field is valid
    if($photo != "Yes" &&  $photo != "No" && $photo != "Unsure"){
        $errorMessage .= '<p class="mistake">Please tell us if you have taken photos before</p>';
        $validData = false;
    }

    $totalChecked = 0;
    if($portrait != 1) $portrait = 0;
    $totalChecked += $portrait;
    if($music != 1) $music = 0;
    $totalChecked += $music;
    if($sports != 1) $sports = 0;
    $totalChecked += $sports;
    if($other != 1) $other = 0;
    $totalChecked += $other;

    if($totalChecked == 0){
        $errorMessage .= '<p class="mistake">Please choose at least one option.</p>';
        $validData = false;
    }

    print '<!-- Starting Saving -->';
    if($validData){
        $sql = 'INSERT INTO tblPhotography
        (fldInquiry, fldInterest, fldName, fldEmail, fldPhoto,
        fldPortrait, fldMusic, fldSports, fldOther)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $data = array($inquiry, $interest, $name, $email, $photo, $portrait, $music, $sports, $other);
        
        try{
            $statement = $pdo->prepare($sql);
            if($statement->execute($data)){
                $statementMessage .= '<h3>Your response was sucessfully submitted!</h3>';
            }
            else{
                $statementMessage .= '<h3>Your response was not sucessfully saved... Please try again</h3>';
            }
        }
        catch(PDOException $e){
            $statementMessage .= '<h3>There was an error inserting your response record. Please try again later.</h3>';
        }
    }
}
?>
<div class="form-container">
<main>

<div class='form-left'>
<h1>Contact Us</h1>
        <p>We want to hear what you have to say.</p>
    <section>
        <h2>Thank you!</h2>
        
        <!-- prints the post array-->
        <!-- post array hidden for users-->
        <!--<?php
        print '<p>Post Array:</p><pre>';
        print_r($_POST);
        print '</pre>';
        ?>-->

        <p>
        Email: aaronlucianophotography@gmail.com
        <br>
        Instagram: <a href='https://www.instagram.com/aaronluciano.photography/'>instagram/aaronluciano.photography</a>
        <br>
        Phone: 774-225-8144
        <br>
        Based out of Boston, Massachusetts; working in Burlington, Vermont.
        <br>
        Direct Message or email for inquiries.
        <br>
        </p>

        <p class='formParagraph'>
        Hello there! Thank you for visiting my photography website. I'm excited to hear that you're interested in getting
        some photos done.
        <br>
        Whether it's for a special occasion or just to capture some moments with loved ones, I would be honored to help you
        preserve those memories.
        <br>
        The best way to get in touch with me is by filling out the form below. Don't worry, it's quick and easy! Just let me
        know what you have in mind and I'll get back to you as soon as possible.
        <br>
        By filling out the form, you'll be taking the first step towards capturing those precious memories. I know that
        finding the right photographer can be overwhelming, but I promise to make the process as easy and stress-free as
        possible.
        <br>
        So go ahead and take that first step! I can't wait to hear from you and help you create beautiful and lasting
        memories.
        </p>
    </section>
</div>

<div class='form-middle'>
    <section>
        <?php
        print $statementMessage;
        print $errorMessage;
        ?>
        <h2 class='formHeader'>Form</h2>
        <form action="#" id="frmInquiry" method="post">
            <fieldset class="listbox">
                <legend>What are you looking for?</legend>
                <p>
                    <select id="ddlInquiry" name="ddlInquiry" tabindex="120">
                        <option 
                        <?php if($inquiry == "taken") print 'selected'; ?>
                            value="taken">Getting photos taken</option>
                        <option 
                        <?php if($inquiry == "learn") print 'selected'; ?>
                            value="learn">Learning about photography</option>
                        <option 
                        <?php if($inquiry == "reccomend") print 'selected'; ?>
                            value="reccomend">Reccomendations for equipment</option>
                        <option 
                        <?php if($inquiry == "other") print 'selected'; ?>
                            value="other">Other</option>
                    </select>
                </p>
            </fieldset>

            <fieldset class="textarea">
                <p>
                    <label for="txtInterest">Send us a message!</label>
                    <textarea id="txtInterest" name="txtInterest" tabindex="200"><?php print $interest?></textarea>
                </p>
            </fieldset>

            <fieldset class="contact">
                <legend>Some information about you.</legend>
                <p>
                    <label class="required" for="txtName">Name</label>
                    <input id="txtName" maxlength="30" name="txtName" onfocus="this.select()" tabindex="300" 
                    type="text" value="<?php if(isset($_POST['txtName'])) {echo htmlentities($_POST['txtName']);} ?>"
                    required>
                </p>

                <p>
                    <label class="required" for="txtEmail">Email</label>
                    <input id="txtEmail" maxlength="30" name="txtEmail" onfocus="this.select()" tabindex="305" 
                    type="email" value="<?php if(isset($_POST['txtEmail'])) {echo htmlentities($_POST['txtEmail']);} ?>"
                    required>
                </p>

            </fieldset>

            <fieldset class="radio">
                <legend>Are you interested in getting some photos done?</legend>
                <p>
                    <input type="radio" id="radPhotoYes" name="radPhoto" value="Yes" tabindex="410" 
                    <?php if ($photo == "Yes") print 'checked';?> required>
                    <label class="radio-field" for="radPhotoYes">Yes, I am</label>
                </p>

                <p>
                    <input type="radio" id="radPhotoNo" name="radPhoto" value="No" tabindex="430" 
                    <?php if ($photo == "No") print 'checked';?> required>
                    <label class="radio-field" for="radPhotoNo">No, I am not</label>
                </p>

                <p>
                    <input type="radio" id="radPhotoUnsure" name="radPhoto" value="Unsure" tabindex="440" 
                    <?php if ($photo == "Unsure") print 'checked';?> required>
                    <label class="radio-field" for="radPhotoUnsure">Not sure / Just sending a message</label>
                </p>
            </fieldset>

            <fieldset class="checkbox">
                <legend>Looking for photo work? (Select at least one)</legend>
                <p>
                    <input id="chkPortrait" name="chkPortrait" tabindex="510"
                     type="checkbox" value="1" <?php if($portrait) print "checked"; ?>>
                    <label for="chkPortrait">Portraits / Group Portraits</label>
                </p>

                <p>
                    <input id="chkMusic" name="chkMusic" tabindex="520" 
                    type="checkbox" value="1" <?php if($music) print "checked"; ?>>
                    <label for="chkMusic">Music / Concert Photography</label>
                </p>

                <p>
                    <input id="chkSports" name="chkSports" tabindex="530" 
                    type="checkbox" value="1" <?php if($sports) print "checked"; ?>>
                    <label for="chkSports">Sports / Club Photos</label>
                </p>

                <p>
                    <input id="chkOther" name="chkOther" tabindex="540" 
                    type="checkbox" value="1" <?php if($other) print "checked"; ?>>
                    <label for="chkOther">Something else</label>
                </p>
            </fieldset>

            <fieldset class="buttons">
                <input id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Submit">
            </fieldset>
        </form>
    </section>
</div>

<div class='form-right'>
    <figure>
        <img alt="contactUs" 
        src="images/contact.webp"> 
        <figcaption><cite>Original Work - Aaron Luciano</cite></figcaption>
    </figure>
</div>

<?php
    // email reply after form
    $from_email = $_POST['txtEmail'];
    
    $to_email = $_POST['txtEmail'];
    $subject = 'Contact Form Submitted! - Aaron Luciano Photography';
    $message .= "Hello $name,\n\nThank you for reaching out! Here is a summary of your message:\n--------------------------------------------------------------\n\n";
    if($inquiry == 'taken'){
        $message .= "Inquiry Type: Getting Photos Taken\n";
    }
    elseif($inquiry == 'learn'){
        $message .= "Inquiry Type: Learning about photography\n";
    }
    elseif($inquiry == 'reccomend'){
        $message .= "Inquiry Type: Reccomendations for equipment\n";
    }
    else{
        $message .= "Inquiry Type: Other\n";
    }
    $message .= "\nInterest: $interest\n\n";
    
    if($photo == 'Yes'){
        $message .= "Are you interested in getting some photos done?: Yes, I am\n";
    }
    elseif($photo == 'No'){
        $message .= "Are you interested in getting some photos done?: No, I am not\n";
    }
    else{
        $message .= "Are you interested in getting some photos done?: Not sure / Just sending a message\n";
    }
    $message .= "\nLooking for photo work?: \n";

    if($portrait == 1){
        $message .= "Portrait / Group Portraits\n";
    }
    if($music == 1){
        $message .= "Music / Concert Photography\n";
    }
    if($sports == 1){
        $message .= "Sports / Club Photos\n";
    }
    if($other == 1){
        $message .= "Something else\n";
    }

    $message .= "\n\n- We will get back to you soon.\n\nBest regards,\nAaron Luciano Photography";

    $headers = 'From: ' . $from_email . "\r\n" .
    'Reply-To: ' . $from_email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to_email, $subject, $message, $headers);
?>

</main>
</div>
<?php
include 'footer.php';
?>