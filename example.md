Create PHP file:

```
<!DOCTYPE html>
<html>
<head>
    <script src="<?= $recaptcha_helper::getApiUrl($recaptcha_helper::ENGLISH_US, $recaptcha) ?>"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('<?=$recaptcha->getSiteKey()?>', {action: 'homepage'}).then(function (token) {
                let form = document.getElementById('firstForm');
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = '<?=$recaptcha->getPublicKeyName()?>';
                input.value = token;
                form.appendChild(input);
            });
        });
    </script>
</head>
<body>
<form method="POST" id="firstForm">
    <input type="text" name="name" value="test"/>
    <input type="submit" value="Send"/>
</form>

</body>
</html>
```

Kohana Controller:
```
public function action_index()
    {
        $this->template->recaptcha = new Recaptcha();
        $this->template->recaptcha_helper = new Recaptcha_Helper();

        if ($this->request->method() == Request::POST)
        {
            $validation = Validation::factory($this->request->post())
                //Action provided must be the same as in JS init
                ->rule(Recaptcha::getPublicKeyName(), 'Recaptcha::recaptchaValid', [':value', 'homepage']);

            if ($validation->check())
            {
                echo 'no_errors';
            }
            else
            {
                var_dump($validation->errors());
            }
        }
    }
    ```
