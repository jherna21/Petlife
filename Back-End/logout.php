<?php

    session_start();
    session_destroy();
	echo "<script>alert('Est\u00e1 saliendo de PetLife');
		window.location.href=\"../index.html\"</script>";
    //header("Location: ../index.html");

?>