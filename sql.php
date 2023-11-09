<?php
include 'top.php';
?>
<main>
    <h1>SQL Statements</h1>

    <h2>Create Table for Contact Form</h2>
    <pre>
        CREATE TABLE tblPhotography(
            pmkPhotography INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldInquiry varchar(50) DEFAULT NULL,
            fldInterest text DEFAULT NULL,
            fldName varchar(40) DEFAULT NULL,
            fldEmail varchar(200) DEFAULT NULL,
            fldPhoto varchar(20) DEFAULT NULL,
            fldPortrait tinyint(1) DEFAULT 0,
            fldMusic tinyint(1) DEFAULT 0,
            fldSports tinyint(1) DEFAULT 0,
            fldOther tinyint(1) DEFAULT 0
        )
    </pre>

    <h2>Insert Record</h2>
    <pre>
        INSERT INTO tblPhotography
            (fldInquiry, fldInterest, fldName, fldEmail, fldPhoto,
            fldPortrait, fldMusic, fldSports, fldOther)
        VALUES
        ('learn', 'I would like some photos done for my graduation',
        'Aaron Luciano', 'adlucian@uvm.edu', 'learn', '1', '0', '0', '0')
    </pre>

    <h2>Create Table for About Section</h2>
    <pre>
        CREATE TABLE tblVisited(
            pmkPhotography INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldCity varchar(25) DEFAULT NULL,
            fldState varchar(25) DEFAULT NULL,
            fldOccasion varchar(100) DEFAULT NULL,
            fldRating varchar(3) DEFAULT NULL,
            fldNotes varchar(200) DEFAULT NULL
        )
    </pre>
    <h2>Inserting Record for Visited Table</h2>
    <pre>
        INSERT INTO tblVisited
            (fldCity, fldState, fldOccasion, fldRating, fldNotes)
        VALUES
        ('Morristown', 'Vermont', 'Hiking and landscape Photography', '5/5', 'Beautiful hike and great photos'),
        ('Boston', 'Massachusetts', 'Street Photography', '5/5', 'One of my favorite places to be in, explore, and take photos'),
        ('Providence', 'Rhode Island', 'Album Cover Photos for local band', '4/5', 'Great people, great environment, great time'),
        ('Bristol', 'Rhode Island', 'Highschool Senior Photoshoot', '4/5', 'Amazing weather and awesome outcomes!'),
        ('Burlington', 'Vermont', 'FallFest 2022 @ UVM', '5/5', 'Great show and amazing photos as well'),
        ('Burlington', 'Vermont', 'SpringFest 2023 @ UVM', '4/5', 'Weather was not so great, but the performances were amazing'),
        ('Worcester', 'Massachusetts', 'Cheer States 2022', '5/5', 'Cheerleading is such an interesting sport that has some amazing routines; great time shooting for this event')


</main>
<?php
include 'footer.php';
?>