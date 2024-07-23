$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    stringLength: {
                        min: 1,
                    },
                    notEmpty: {
                        message: 'Por favor, forneça seu primeiro nome'
                    }
                }
            },
            last_name: {
                validators: {
                    stringLength: {
                        min: 1,
                    },
                    notEmpty: {
                        message: 'Por favor, forneça seu sobrenome'
                    }
                }
            },
            data_nascimento: {
                validators: {
                    notEmpty: {
                        message: 'Por favor, forneça sua data de nascimento'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'Por favor, forneça uma data válida no formato DD/MM/AAAA'
                    }
                }
            },
            sexo: {
                validators: {
                    notEmpty: {
                        message: 'Por favor, selecione seu sexo'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Por favor, forneça seu endereço de e-mail'
                    },
                    emailAddress: {
                        message: 'Por favor, forneça um endereço de e-mail válido'
                    }
                }
            },
            tipo_sangue: {
                validators: {
                    notEmpty: {
                        message: 'Por favor, selecione seu tipo de sangue'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Por favor, forneça seu número de telefone'
                    },
                    phone: {
                        country: 'BR',
                        message: 'Por favor, forneça um número de telefone com código de área'
                    }
                }
            },
            rg: {
                validators: {
                    notEmpty: {
                        message: 'Por favor, forneça seu RG'
                    },
                    stringLength: {
                        min: 9,
                        max: 12,
                        message: 'Por favor, forneça um RG válido'
                    }
                }
            },
            cpf: {
                validators: {
                    notEmpty: {
                        message: 'Por favor, forneça seu CPF'
                    },
                    stringLength: {
                        min: 11,
                        max: 14,
                        message: 'Por favor, forneça um CPF válido'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        $.post($form.attr('action'), $form.serialize(), function(result) {
            console.log(result);
            if (result.trim() === 'Dados inseridos com sucesso!') {
                $('#success_message').show();
                $form[0].reset();
                bv.resetForm();
                setTimeout(function() {
                    window.location.href = 'result.html';  // Redireciona para result.html após o sucesso
                }, 2000);  // Ajuste o tempo conforme necessário
            } else {
                alert(result);  // Mostra a mensagem de erro retornada pelo servidor
            }
        }).fail(function() {
            alert('Ocorreu um erro ao enviar o formulário. Tente novamente.');
        });
    });
});

