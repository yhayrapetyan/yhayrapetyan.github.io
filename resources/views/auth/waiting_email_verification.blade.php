<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>we send message to your email please check </h2>

<script>
    async function isVerified() {
        const response = await fetch('/api/user/' + {{json_encode($user->id)}}).then(response => response.json())
        return response.isVerified;
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function doSomethingWhenVerified() {
        while (! await isVerified()) {
            await sleep(5000);
        }
        localStorage.setItem('successMessage', 'Your are successfully verified!');
        window.location.href = '/login'
    }
    doSomethingWhenVerified();
</script>


</body>
</html>
