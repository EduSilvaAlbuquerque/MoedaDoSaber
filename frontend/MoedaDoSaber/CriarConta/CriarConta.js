document.getElementById('formCadastro').addEventListener('submit', async function (event) {
  event.preventDefault();

  const form = event.target;
  const nome = form.nome.value.trim();
  const email = form.email.value.trim();
  const senha = form.senha.value.trim();
  const confirmarSenha = form.confirmarSenha.value.trim();
  const fone = form.Fone.value.trim();
  const cpf = form.cpf.value.trim();
  const data_nascimento = form.dataNascimento.value;

  if (senha !== confirmarSenha) {
    alert('As senhas não coincidem!');
    return;
  }

  if (!validarCPF(cpf)) {
    alert('CPF inválido!');
    return;
  }

  if (!validarFone(fone)) {
    alert('Telefone inválido! Use o formato (99) 99999-9999');
    return;
  }

  if (!data_nascimento) {
    alert('Data de nascimento inválida!');
    return;
  }

  const dados = {
    nome,
    email,
    senha,
    fone,
    cpf,
    data_nascimento
  };

  try {
    const resposta = await fetch('http://localhost:81/v1/cadastro', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(dados)
    });

    if (!resposta.ok) {
      const erro = await resposta.json().catch(() => ({}));
      throw new Error(erro.message || 'Erro desconhecido ao cadastrar.');
    }

    const resultado = await resposta.json().catch(() => ({}));
    alert(resultado.message || 'Conta criada com sucesso!');
    window.location.href = '../Login/login.html';
  } catch (erro) {
    alert('Erro ao criar conta: ' + erro.message);
  }
});

function validarCPF(cpf) {
  return /^\d{11}$/.test(cpf.replace(/\D/g, ''));
}

function validarFone(fone) {
  return /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/.test(fone);
}
