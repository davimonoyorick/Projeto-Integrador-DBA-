from django.shortcuts import render, redirect
from .forms import UsuarioForm, AgendamentoForm
from .models import Usuario, Agendamento

def index(request):
    return render(request, 'index.html')

def cadastrar_usuario(request):
    if request.method == 'POST':
        form = UsuarioForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('index')
    else:
        form = UsuarioForm()
    return render(request, 'cadastrar_usuario.html', {'form': form})

def agendar(request):
    if request.method == 'POST':
        form = AgendamentoForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('index')
    else:
        form = AgendamentoForm()
    return render(request, 'agendar.html', {'form': form})
