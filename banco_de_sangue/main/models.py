from django.db import models

class Usuario(models.Model):
    nome = models.CharField(max_length=100)
    email = models.EmailField(unique=True)
    senha = models.CharField(max_length=100)
    data_nascimento = models.DateField()
    tipo_sanguineo = models.CharField(max_length=3)

class Agendamento(models.Model):
    usuario = models.ForeignKey(Usuario, on_delete=models.CASCADE)
    data = models.DateField()
    hora = models.TimeField()
    local = models.CharField(max_length=100)
