<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Actors</title>
    <style type="text/css">
        table
        {
            border: 1px solid purple;
        }
        th, td
        {
            border: 1px solid red;
        }
    </style>
</head>
<body>
<?php
if(!empty($lastOperationResults)):
    ?>
    <h2><?php echo $lastOperationResults; ?></h2>
<?php
endif;
?>
<h1>Current Actors:</h1>
<table>
    <thead>
    <tr>
        <th>Actor ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

    <div>Search First & Last names From Database:</div>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <p><label>Search:  <input type="text" name="search" id="search" /></label></p>
        <p><input type="submit" name="submit" value="Display Query" /></p>
    </form>

    <?php
    foreach($arrayOfActors as $actor):

        ?>
        <tr>
            <td><?php echo $actor->getID(); ?></td>
            <td><?php echo $actor->getFirstName(); ?></td>
            <td><?php echo $actor->getLastName(); ?></td>
            <td>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idUpdate=<?php echo $actor->getID(); ?>">
                    <img src="/home/inet2005/PhpstormProjects/w0256244/lab7V1/Public/Images/edit_icon.png" height="25px" width="25px"/>
                </a>
            </td>
            <td>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idDelete=<?php echo $actor->getID(); ?>">
                    <img src="/home/inet2005/PhpstormProjects/w0256244/lab7V1/Public/Images/edit_icon.png" height="25px" width="25px"/>
                </a>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idInsert=idInsert">Insert new Actor</a>
<!--    <a href="/home/inet2005/PhpstormProjects/w0256244/lab7V1/View/insert.php">Insert new Actor</a>-->
    </tbody>
    <tfoot></tfoot>
</table>
</body>
</html>
