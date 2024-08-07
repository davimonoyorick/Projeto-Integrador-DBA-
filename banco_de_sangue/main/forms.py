from django import forms
from .models import Usuario, Agendamento

class UsuarioForm(forms.ModelForm):
    class Meta:
        model = Usuario
        fields = ['nome', 'email', 'senha', 'data_nascimento', 'tipo_sanguineo']

class AgendamentoForm(forms.ModelForm):
    class Meta:
        model = Agendamento
        fields = ['usuario', 'data', 'hora', 'local']
