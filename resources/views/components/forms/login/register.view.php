
<form action="/register"
      method="post"
      class="flex flex-col gap-6">
    <?php
    csrf_token() ?>
    <div class="flex flex-col gap-2">
        <?php
        component('forms.controls.label-and-input', [
            'name' => 'email',
            'label' => 'E-mail',
            'type' => 'email',
            'value' => '',
            'placeholder' => 'john.doe@gmail.com'

        ]);
        ?>

    </div>
    <div class="flex flex-col gap-2">
        <?php
        component('forms.controls.label-and-input', [
            'name' => 'psw',
            'label' => 'Mot de passe',
            'type' => 'password',
            'value' => '',
            'placeholder' => 'Mot de Passe'

        ]);
        ?>
    </div>

    <div class="flex flex-col gap-2">
        <?php
        component('forms.controls.label-and-input', [
            'name' => 'psw_validation',
            'label' => 'Mot de passe Confirmation',
            'type' => 'password',
            'value' => '',
            'placeholder' => 'Mot de Passe Confirmation'

        ]);
        ?>
    </div>
    <div>
        <?php
        component('forms.controls.button', ['text' => 'Insciption']) ?>
    </div>
    <?php
    $_SESSION['errors'] = [];
    $_SESSION['old'] = [];
    ?>
</form>