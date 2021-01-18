<footer>
    <p>Copyright &copy;
    <?php
    $startYear = 2007;
    $thisYear = date('Y');
    if ($startYear == $thisYear) {
        echo $startYear;
    } else {
        echo "{$startYear}&ndash;{$thisYear}";
    }
    ?>
    Norway</p>
</footer>