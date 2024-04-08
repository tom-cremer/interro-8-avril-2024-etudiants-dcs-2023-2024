
<form action="/login"
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
            'name' => 'email',
            'label' => 'Mot de passe',
            'type' => 'password',
            'value' => '',
            'placeholder' => 'Mot de Passe'

        ]);
        ?>
    </div>
    <div>
        <?php
        component('forms.controls.button', ['text' => 'Connexion']) ?>
    </div>
    <?php
    $_SESSION['errors'] = [];
    $_SESSION['old'] = [];
    ?>
</form>