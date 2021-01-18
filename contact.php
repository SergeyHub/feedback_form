<?php
include('includes/contact.inc.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>norway<?php echo "&#8212;{$title}"; ?></title>
    <link href="./css/main.css" rel="stylesheet" type="text/css" media="screen">
    <link href="./css/menu.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
<div class="wrapper">
    <header class="header">
        <h1>Norway</h1>
    </header> <!-- end header -->
    <?php include('./includes/menu.inc.php'); ?>
    <main class="maincontent">
        <h2>Contact Us </h2>

        <?php if (($_POST && $suspect) || ($_POST && isset($errors['mailfail']))) { ?>
            <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
        <?php } elseif ($missing || $errors) { ?>
            <p class="warning">Please fix the item(s) indicated.</p>
        <?php } ?>

        <form method="post" action="contact.php">
            <p>
                <label for="name">Name:
                    <?php if (in_array('name', $missing)) { ?>
                        <span class="warning">Please enter your name</span>
                    <?php } ?>
                </label>
                <input name="name" id="name" type="text"
                    <?php if ($missing || $errors) {
                        echo 'value="' . htmlentities($name) . '"';
                    } ?>>
            </p>
            <p>
                <label for="email">Email:
                    <?php if (in_array('email', $missing)) { ?>
                        <span class="warning">Please enter your email address</span>
                    <?php } elseif (isset($errors['email'])) { ?>
                        <span class="warning">Invalid email address</span>
                    <?php } ?>
                </label>
                <input name="email" id="email" type="text"
                    <?php if ($missing || $errors) {
                        echo 'value="' . htmlentities($email) . '"';
                    } ?>>
            </p>
            <p>
                <label for="comments">Comments:
                    <?php if (in_array('comments', $missing)) { ?>
                        <span class="warning">Please enter your comments</span>
                    <?php } ?>
                </label>
                <textarea name="comments" id="comments"><?php
                    if ($missing || $errors) {
                        echo htmlentities($comments);
                    } ?></textarea>
            </p>
            <fieldset id="subscribe">
                <h2>Subscribe to newsletter?
                    <?php if (in_array('subscribe', $missing)) { ?>
                        <span class="warning">Please make a selection</span>
                    <?php } ?>
                </h2>
                <p>
                    <input name="subscribe" type="radio" value="Yes" id="subscribe-yes"
                        <?php
                        if ($_POST && $_POST['subscribe'] == 'Yes') {
                            echo 'checked';
                        } ?>>
                    <label for="subscribe-yes">Yes</label>
                    <input name="subscribe" type="radio" value="No" id="subscribe-no"
                        <?php
                        if ($_POST && $_POST['subscribe'] == 'No') {
                            echo 'checked';
                        } ?>>
                    <label for="subscribe-no">No</label>
                </p>
            </fieldset>
            <fieldset id="interests">
                <h2>Contact Form
                    <?php if (isset($errors['interests'])) { ?>
                        <span class="warning">Please select at least <?= $minCheckboxes ?></span>
                    <?php } ?>
                </h2>
                <div>
                    <p>
                        <input type="checkbox" name="interests[]" value="Fiords" id="anime"
                            <?php
                            if ($_POST && in_array('Fiords', $_POST['interests'])) {
                                echo 'checked';
                            } ?>>
                        <label for="anime">Fiords</label>
                    </p>
                    <p>
                        <input type="checkbox" name="interests[]" value="Arts & crafts" id="art"
                            <?php
                            if ($_POST && in_array('Arts & crafts', $_POST['interests'])) {
                                echo 'checked';
                            } ?>>
                        <label for="art">Arts &amp; crafts</label>
                    </p>
                    <p>
                        <input type="checkbox" name="interests[]" value="Landscape, Architecture, etc" id="judo"
                            <?php
                            if ($_POST && in_array('Landscapes, Architecture, etc', $_POST['interests'])) {
                                echo 'checked';
                            } ?>>
                        <label for="judo">Landscape, Architecture, etc</label>
                    </p>
                </div>
                <div>
                    <p>
                        <input type="checkbox" name="interests[]" value="Language/literature" id="lang_lit"
                            <?php
                            if ($_POST && in_array('Language/literature', $_POST['interests'])) {
                                echo 'checked';
                            } ?>>
                        <label for="lang_lit">Language/literature</label>
                    </p>
                    <p>
                        <input type="checkbox" name="interests[]" value="Science & technology" id="scitech"
                            <?php
                            if ($_POST && in_array('Science & technology', $_POST['interests'])) {
                                echo 'checked';
                            } ?>>
                        <label for="scitech">Science &amp; technology</label>
                    </p>
                    <p>
                        <input type="checkbox" name="interests[]" value="Travel" id="travel"
                            <?php
                            if ($_POST && in_array('Travel', $_POST['interests'])) {
                                echo 'checked';
                            } ?>>
                        <label for="travel">Travel</label>
                    </p>
                </div>
            </fieldset>
            <p>
                <label for="howhear">How did you hear of Norway?
                    <?php if (in_array('howhear', $missing)) { ?>
                        <span class="warning">Please make a selection</span>
                    <?php } ?>
                </label>
                <select name="howhear" id="howhear">
                    <option value=""
                        <?php
                        if (!$_POST || $_POST['howhear'] == '') {
                            echo 'selected';
                        } ?>>Select one
                    </option>
                    <option value="School"
                        <?php
                        if ($_POST && $_POST['howhear'] == 'School') {
                            echo 'selected';
                        } ?>>School
                    </option>
                    <option value="recommended by friend"
                        <?php
                        if ($_POST && $_POST['howhear'] == 'recommended by friend') {
                            echo 'selected';
                        } ?>>Recommended by a friend
                    </option>
                    <option value="search engine"
                        <?php
                        if ($_POST && $_POST['howhear'] == 'search engine') {
                            echo 'selected';
                        } ?>>Search engine
                    </option>
                </select>
            </p>
            <p>
                <label for="characteristics">What characteristics do you associate with Norway?
                    <?php if (isset($errors['characteristics'])) { ?>
                        <span class="warning">Please select at least <?= $minList ?></span>
                    <?php } ?>
                </label>
                <select name="characteristics[]" size="6" multiple="multiple" id="characteristics">
                    <option value="Dynamic"
                        <?php
                        if ($_POST && in_array('Dynamic', $_POST['characteristics'])) {
                            echo 'selected';
                        } ?>>Dynamic
                    </option>
                    <option value="Honest"
                        <?php
                        if ($_POST && in_array('Honest', $_POST['characteristics'])) {
                            echo 'selected';
                        } ?>>Honest
                    </option>
                    <option value="Pacifist"
                        <?php
                        if ($_POST && in_array('Pacifist', $_POST['characteristics'])) {
                            echo 'selected';
                        } ?>>Pacifist
                    </option>
                    <option value="Devious"
                        <?php
                        if ($_POST && in_array('Devious', $_POST['characteristics'])) {
                            echo 'selected';
                        } ?>>Devious
                    </option>
                    <option value="Inscrutable"
                        <?php
                        if ($_POST && in_array('Inscrutable', $_POST['characteristics'])) {
                            echo 'selected';
                        } ?>>Inscrutable
                    </option>
                    <option value="Warlike"
                        <?php
                        if ($_POST && in_array('Warlike', $_POST['characteristics'])) {
                            echo 'selected';
                        } ?>>Warlike
                    </option>
                </select>
            </p>
            <p>
                <input type="checkbox" name="terms" value="accepted" id="terms"
                    <?php
                    if ($_POST && !isset($errors['terms'])) {
                        echo 'checked';
                    } ?>>
                <label for="terms">I accept the terms of using this website
                    <?php if (isset($errors['terms'])) { ?>
                        <span class="warning">Please select the check box</span>
                    <?php } ?></label>
            </p>
            <p>
                <input name="send" type="submit" value="Send message">
            </p>
        </form>
    </main>

    <footer class="footer">
        <?php include './includes/footer.inc.php'; ?>
    </footer>
</div>
</body>
</html>
