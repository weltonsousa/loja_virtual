$(document).ready(function () {

    $('.btn-apagar-registro').on('click', function () {
        if (confirm("Deseja apagar o registro")) {
            return true;
        } else {
            return false;
        }
    });
    /*
    * Mask inputs
    */

    $('.input_data').mask('00/00/0000');
    $('.input_cep').mask('00000-000');

    /*telefone com 9 digititos */
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.input_telefone').mask(SPMaskBehavior, spOptions);
    $('.input_cpf').mask('000.000.000-00', { reverse: true });


    /*puglin DataTable*/
    $('.table_listar_DataTable').DataTable({


        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

    $('.sidebar-menu').tree()
});