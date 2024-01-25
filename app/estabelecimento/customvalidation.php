<?php
echo "<script>";
?>
form.validate({
    focusInvalid: true,
    invalidHandler: function() {
    },
    errorPlacement: function errorPlacement(error, element) { element.after(error); },
    rules:{

        <?php
        $variacao = json_decode($data_content['variacao'], TRUE);
        $validacao = "";
        for ($x = 0; $x < count($variacao); $x++) {
            echo "variacao[" . $x . "]: {\n";
            if ($variacao[$x]['escolha_minima'] >= "1") {
                echo "required: true,\n";
            }
            echo "minlength: " . htmljson($variacao[$x]['escolha_minima']) . ",\n";
            echo "maxlength: " . htmljson($variacao[$x]['escolha_maxima']) . "\n";
            echo "},\n\n";
        }
        ?>

    },
    messages:{

        <?php
        $variacao = json_decode($data_content['variacao'], TRUE);
        $validacao = "";
        for ($x = 0; $x < count($variacao); $x++) {
            echo "variacao[" . $x . "]: {\n";
            if ($variacao[$x]['escolha_minima'] >= "1") {
                echo "required: 'Esse campo é obrigatório',\n";
            }
            echo "minlength: 'Você deve escolher ao menos " . htmljson($variacao[$x]['escolha_minima']) . " itens',\n";
            echo "maxlength: 'Você deve escolher no máximo " . htmljson($variacao[$x]['escolha_maxima']) . " itens'\n";
            echo "},\n\n";
        }
        ?>

    }
});
<?php
echo "</script>";
?>
