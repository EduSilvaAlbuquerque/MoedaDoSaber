document.getElementById('formCadastro').addEventListener('submit', async function (event) {
  event.preventDefault();

  const form = event.target;
  const email = form.email.value.trim();
  const senha = form.senha.value.trim();
  const confirmarSenha = form.confirmarSenha.value.trim();

  if (senha !== confirmarSenha) {
    alert('As senhas não coincidem!');
    return;
  }

  const dados = {
    nome: email.split('@')[0],
    email,
    senha
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
