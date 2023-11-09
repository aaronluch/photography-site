<?php
include 'top.php';


// $sheffieldResultsFemale = array(
//     #array('name','place','bw','squat3','bench3','deadlift3','total')
//     array('Evie Corrigan',1,51.8,160,97.5,202.5,460),
//     array('Noémie Allabert',2,51.9,171.5,87.5,195,454),
//     array('Jade Jacob',3,56.5,180,92.5,231,503.5)

// );

// $sheffieldResultsMale = array(
//     array('Jesus Olivares',1,178.2,470,272.5,410,1152.5),
//     array('Jonathan Cayco',2,92.5,300,241.5,342.5,866),
//     array('Gavin Adin',3,92.9,325,215,340,880)
// );
?>

<div class='navPadding'>
    <div class="home-grid-container">
        <main class='item1about'>
            <!--<h1><b>Aaron Luciano</b></h1>-->
            <figure class='aboutFigure'>
                <img id='aboutImage' class='aboutImage' alt="aaronHike" src="images/about.webp">
                <figcaption>Original Work - Aaron Luciano</figcaption>
            </figure>
        </main>

        <div class="item2about">
            <h2 class='arrayh2'>About me.</h2>
            <p>I'm Aaron Luciano, a photographer based out of Burlington, VT but originally from Boston, Massachusetts.
                I
                specialize in portraits and music/concert photography, but I'm also experienced in landscapes and
                events.
                <br><br>
                My passion for photography started in high school when I picked up a camera for the first time. Since
                then,
                I've honed my craft through years of practice and experimentation. I find that there's something truly
                magical about capturing a moment in time and preserving it forever through photography.
                <br><br>
                As a portrait photographer, I strive to create a comfortable and relaxed environment for my clients,
                allowing them to express their unique personalities and tell their own stories through the photos. I
                also
                enjoy the challenge of capturing the energy and excitement of live music events through my concert
                photography.
                <br><br>
                In addition to my portrait and music work, I'm always looking to capture the beauty of the world around
                us
                through landscapes and events. I love exploring new places and discovering new perspectives, and I find
                that
                photography is the perfect way to share those experiences with others.
                <br><br>
                Whether you're in need of a portrait photographer, concert photographer, or just want to capture a
                special
                moment, I would love to work with you and bring your vision to life.
            </p>
        </div>

        <div class='item3'>
            <h2 class='tableh2'>Favorite Shoots</h2>
            <table class='visitedTable'>
                <thead class="header-row">
                    <tr>
                        <th>City</th>
                        <th>State</th>
                        <th>Occasion</th>
                        <th>Rating</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT fldCity, fldState, fldOccasion, fldRating, fldNotes
                    from tblVisited';
                    $statement = $pdo->prepare($sql);
                    $statement->execute();

                    $records = $statement->fetchAll();

                    foreach ($records as $record): ?>
                        <tr>
                            <td>
                                <?php echo $record['fldCity']; ?>
                            </td>
                            <td>
                                <?php echo $record['fldState']; ?>
                            </td>
                            <td>
                                <?php echo $record['fldOccasion']; ?>
                            </td>
                            <td>
                                <?php echo $record['fldRating']; ?>
                            </td>
                            <td>
                                <?php echo $record['fldNotes']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php
include 'footer.php';
?>