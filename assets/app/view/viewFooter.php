<?php

class ViewFooter
{

  private ?string $script;

  public function getScript(): ?string
  {
    return $this->script;
  }

  public function setScript(?string $script): self
  {
    $this->script = $script;
    return $this;
  }

  public function displayView(): string
  {
    return ('
      <footer class="footer-container">
        <div class="footer__redes-sociais">
          <a href="https://www.facebook.com/MinutosTelecom/?locale=pt_BR" target="_blank"
            class="footer__redes-sociais__item">
            <img src="../../img/icon/facebook-icon-pb-minutos-telecom.png" alt="Página no Facebook da Minutos Telecom" />
            <p>Facebook</p>
          </a>
          <a href="https://www.instagram.com/minutostelecom/" target="_blank" class="footer__redes-sociais__item">
            <img src="../../img/icon/instagram-icon-pb-minutos-telecom.png" alt="Página no Instagram da Minutos Telecom" />
            <p>Instagram</p>
          </a>
          <a href="#" target="_blank" class="footer__redes-sociais__item">
            <img src="../../img/icon/whatsapp-icon-pb-minutos-telecom.png" alt="Página no WhatsApp da Minutos Telecom" />
            <p>WhatsApp</p>
          </a>
        </div>
        <h4 class="footer-container__dados__fale-conosco__titulo">
          Fale Conosco
        </h4>
        <div class="footer-container__dados">
          <div class="footer-container__dados__fale-conosco">
            <div class="footer-container__dados__fale-conosco__item">
              <img src="../../img/icon/telefone-icon-minutos-telecom.png" alt="Ícone de telefone Minutos Telecom" />
              <p>Telefone: <a href="tel:+551930810000">+55 19 3081-0000</a></p>
            </div>
            <div class="footer-container__dados__fale-conosco__item">
              <img src="../../img/icon/whatsapp-icon-branco-minutos-telecom.png" alt="Ícone WhatsApp Minutos Telecom" />
              <p>
                WhatsApp:
                <a href="https://api.whatsapp.com/send?phone=551930810000&text=Ol%C3%A1,%20Minutos!" target="_blank">+55 19
                  3081-0000</a>
              </p>
            </div>
            <div class="footer-container__dados__fale-conosco__item">
              <img src="../../img/icon/sac-icon-minutos-telecom.png" alt="Ícone de SAC Minutos Telecom" />
              <p>SAC: <a href="tel:08006027300">0800 602 7300</a></p>
            </div>
            <div class="footer-container__dados__fale-conosco__item">
              <img src="../../img/icon/contato-icon-minutos-telecom.png" alt="Ícone de contato Minutos Telecom" />
              <p>
                <a href="mailto:contato@minutostelecom.com.br">contato@minutostelecom.com.br</a>
              </p>
            </div>
            <div class="footer-container__dados__fale-conosco__item">
              <img src="../../img/icon/suporte-icon-minutos-telecom.png" alt="Ícone de suporte Minutos Telecom" />
              <p>
                <a href="mailto:suporte@minutostelecom.com.br">suporte@minutostelecom.com.br</a>
              </p>
            </div>
            <div class="footer-container__dados__fale-conosco__item">
              <img src="../../img/icon/endereco-icon-minutos-telecom.png" alt="Ícone de endereço Minutos Telecom" />
              <p>
                Av. Marechal Rondon, 700 – Sala 310 <br />
                Campinas/SP – Brasil
              </p>
            </div>
          </div>
          <div class="footer-container__dados__maps">
            <iframe class="footer-container__dados__maps__mapa"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.5335822388993!2d-47.091175750198836!3d-22.893682027013462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8cfd75353e67f%3A0x58291dbe79203e5f!2sR.%20Mal.%20Rondon%2C%20700%20-%20Jardim%20Chapad%C3%A3o%2C%20Campinas%20-%20SP%2C%2013070-173%2C%20Br%C3%A9sil!5e0!3m2!1sfr!2sfr!4v1734949365898!5m2!1sfr!2sfr"
              style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="footer-container__dados__suporte">
            <div class="footer-container__dados__suporte__titulo">
              <div class="footer-container__dados__suporte__titulo-flex">
                <h4>Precisando de</h4>
                <img src="../../img/icon/whatsapp-icon-minutos-telecom.png"
                  alt="Suporte Técnico via WhatsApp Minutos Telecom" />
              </div>
              <h4>Suporte Técnico?</h4>
            </div>
            <div class="footer-container__dados__suporte__texto">
              <p>
                Nosso suporte é dado via WhatsApp com maior agilidade e sem robôs.
              </p>
            </div>
            <div class="footer-container__dados__suporte__btn">
              <a href="https://api.whatsapp.com/send?phone=551930810000&text=Ol%C3%A1,%20Minutos!" target="_blank">(19)
                3081.0000</a>
            </div>
          </div>
        </div>
        <div class="footer-container__direitos">
          <p>
            &copy Copyright 2024 - Minutos Telecom | Criado por
            <a href="https://pmgoudet.vercel.app/" target="_blank">Pedro Mattiazzo Goudet</a>
            | Todos os direitos reservados.
          </p>
        </div>
      </footer>'

      . $this->getScript() .

      '</body>
    </html>
    ');
  }
}
