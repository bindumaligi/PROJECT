<p class="suggestion-text">Suggestions For You</p>

<?php include("get_suggestions.php"); ?>
<?php foreach($suggestions as $suggestion) { ?>


    <?php // To check that we don't follow ourseslves ?>
    <?php if($suggestion['id'] != $_SESSION['id']){ ?> 
<!--SUGGESTIONS-->


<div class="suggestion-card">
    <div class="suggestion-pic">
        <img src="<?php echo "assets/imgs/".$suggestion['image']; ?>"/>
    </div>
    <div>
        <p class="username"><?php echo $suggestion['username']; ?></p>
        <p class="sub-text"><?php echo substr($suggestion['bio'],0,15); ?></p>
    </div>
    <form action="follow_this_person.php" method="POST">
        <input type="hidden" name="other_user_id" value="<?php echo $suggestion['id']; ?>">
    <button class="follow-btn" name="follow_btn" type="submit">follow</button>
    </form>
</div>
    

<?php } ?>
<?php } ?>