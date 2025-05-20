<?php

class ViewPageAdminDeco
{

  private ?string $message = '';

  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $newMessage): self
  {
    $this->message = $newMessage;
    return $this;
  }

  //METHOD
  public function displayView(): string
  {
    //!ATENÇÃO NUNCA É <main> NO COMEÇO
    return ('
        <section class="login-container">
          <h2 class="login-container__titulo">Central do Admin</h2>
          <form class="login-form" action="" method="POST" name="form">
            <label for="login-admin">Login:</label>
            <input type="text" id="login-admin" name="login-admin" placeholder="Digite seu e-mail"
              maxlength="18" required />
            <label for="password-admin">Senha:</label>
            <input type="password" id="password-admin" name="password-admin" minlength="2" maxlength="20"
              placeholder="Digite sua senha" required />
            <button type="submit" name="submit-admin" class="button-flex">
              <p>Entrar</p>
              <img src="../../img/icon/porta-icon-minutos-telecom.svg" alt="Ícone de entrar para se conectar" />
            </button>
            <p>' . $this->getMessage() . '</p>
          </form>
        </section>
      </main>
    ');
  }
}
