<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial_scale=1.0"/>
        <title>Feedback Form</title>
        <link href="feedback.css" rel="stylesheet"/>
    </head>

    <body>

        <?php include("header.html"); ?>

        <section id="form">
            <h2>Have a feedback ? Share with us !</h2>

            <form action="feedback_submit.php" method="post" enctype="multipart/form-data">
                <label for="Name">Name or Pseudonym :</label><br>
                <input class="smol" type="text" name="Name" required><br>
                <label for="Email">Email :</label><br>
                <input class="smol" type="email" name="Email" required><br>
                <label for="date">Date of birth :</label><br>
                <input class="smol" type="date" name="DateOfBirth" max="2011-01-01" required><br/>
                <label for="Region">Region :</label><br>
                <select class="smol" id="Region" name="Region" required>
                    <option value="IDF">Île-De-France</option>
                    <option value="Province">The Province</option>
                    <option value="Overseas">The overseas</option>
                    <option value="Foreign">Far far away land</option>
                </select>
                <br>
                <label for="type">Feedback Type :</label><br>
                <select class="big" name="Type" required>
                    <option value="Technical">Technical feedback about the website itself</option>
                    <option value="Content">Give us possible content !</option>
                    <option value="Other">The secret third option</option>
                </select><br>
                <label for="Commentary" required>Commentary :</label><br>
                <textarea name="Commentary" placeholder="Tell us what to add and what to delete."></textarea><br>
                <label for="Sources">Sources :</label><br>
                <textarea name="Sources" placeholder="Tell us your sources."></textarea><br>
                <fieldset>
                    <legend>Do you wish to be contacted ?</legend>
                    <input type="radio" name="Contact" value="1" id="yes">
                    <label for="yes">Yes</label><br>
                    <input type="radio" name="Contact" value="0" id="no" checked>
                    <label for="yes">No</label><br>
                </fieldset>
                <input type="submit" name="Submit" value="Submit">
                <input type="reset" name="Reset" value="Reset">
            </form>
        </section>

        <?php  include("footer.html"); ?>

    </body>
</html>