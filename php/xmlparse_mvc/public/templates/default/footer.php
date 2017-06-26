</div>

<?php
/*
// minifialosra
Assets::js([
	'https://code.jquery.com/jquery-1.12.1.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
], True, True);
* */

Assets::js([
    Url::templatePath('common').'js/jquery.min.js',
    Url::templatePath('common').'js/bootstrap.min.js',
    Url::templatePath('default').'js/main.js',
]);

echo $js; //place to pass data / plugable hook zone
echo $footer; //place to pass data / plugable hook zone
?>

</body>
</html>
