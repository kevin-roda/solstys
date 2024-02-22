<template>
  <div class="rk_blackpage">
    <RouterLink to="/" class="rk_home_btn">
      <div class="rk_arrow_circle light reverse">
        <span class="rk_arrow"></span>
        <span class="rk_circle"></span></div
    ></RouterLink>
    <section class="first">
      <RouterLink to="/" class="rk_home_btn_logo">
        <figure>
          <img src="/logo-blanc.png" alt="logo solstys" />
        </figure>
      </RouterLink>
      <h1>
        La ressource pour <br />
        améliorer votre offre
      </h1>

      <div class="rk_arrow_circle white">
        <span class="rk_arrow"></span>
        <span class="rk_circle"></span>
      </div>
      <h2 class="rk_deco_b" content=">">
        <span>Audit</span> <span>Conseil</span> <span>Formation</span>
      </h2>
    </section>
    <div class="rk_separator"><div class="side"></div></div>

    <section class="rk_middle_sct">
      <div class="rk_one">
        <h3 class="rk_deco_b bottom" content="01">Notre coeur de métier</h3>
        <p>
          Améliorer votre <br />offre en tenant compte <br />
          des indicateurs de gestion.
        </p>
      </div>
      <div class="rk_two">
        <h3 class="rk_deco_b bottom" content="02">Nos moyens</h3>
        <p>
          L’expertise de plus <br />
          de 100 intervenants
        </p>
        <p>
          L’expérience issue de <br />la confiance de<br />
          250 clients
        </p>
      </div>
    </section>
    <div class="rk_separator_line"><div class="side"></div></div>
    <section class="noLine">
      <h2>Nos Valeurs</h2>
      <div class="three_col">
        <div numero="01">
          <h3 class="orange">Transparence</h3>
          <p>
            Nous mettons un point d’honneur à communiquer avec transparence sur
            des points clés tels que notre méthodologie, les tarifs pratiqués,
            nos clients et les actions menées. Nous attendons une réciprocité
            envers nos partenaires.
          </p>
        </div>
        <div numero="02">
          <h3 class="orange">Écoute</h3>
          <p>
            L’écoute et la communication sont des éléments centraux de notre
            mission, c’est la raison qui nous permet de travailler en confiance
            avec nos clients afin de leur proposer des offres sur-mesure.
          </p>
        </div>
        <div numero="03">
          <h3 class="orange">Expérience</h3>
          <p>
            Nous mettons tout notre savoir-faire et notre expérience au service
            de nos clients et partenaires afin de les satisfaire dans notre
            mission.
          </p>
        </div>
      </div>
    </section>
    <div class="rk_separator_line"><div class="side"></div></div>
    <section class="noLineCenter nRight">
      <h2>Contact</h2>
      <div class="content">
        <div class="contact" @click="formActiv = true">
          <h3 class="orange">Nous contacter</h3>
          <div class="rk_arrow_circle light">
            <span class="rk_arrow"></span>
            <span class="rk_circle"></span>
          </div>
        </div>
        <div>
          <p class="title">Solstys</p>
          <p>Responsable des opérations</p>
          <hr />
          <p>Fabrice MEGEVAND</p>
          <hr class="slim" />
          <p>06 19 50 84 62</p>
          <p>f.megevand@solstys.net</p>
        </div>
      </div>
      <div class="rk_left_txt">
        <span></span>
        <P>contact</P>
      </div>
    </section>
    <div class="rk_separator_line"><div class="side"></div></div>
    <section class="noLineCenter">
      <h2>Documents ressources</h2>
      <p class="docs">Documents en téléchargement au format pdf.</p>

      <div class="downloads">
        <form method="get" target="_blank" action="/Accessibilité.pdf">
          <button type="submit">ACCÈS AUX <br />PERSONNES HANDICAPÉES</button>
        </form>
        <form method="get" target="_blank" action="/CGV.pdf">
          <button type="submit">CGV</button>
        </form>
        <form method="get" target="_blank" action="/Indicateurs.pdf">
          <button type="submit">INDICATEURS DE RÉSULTATS</button>
        </form>
      </div>
      <img src="/qualiopi.png" alt="logo qualiopi" />
      <div class="rk_left_txt">
        <span></span>
        <P>ressources</P>
      </div>
    </section>
    <div class="rk_separator_line"><div class="side"></div></div>
    <div class="rk_right_txt">
      <a @click="formActiv = true">Contact</a>
      <span></span>
      <a href="https://www.linkedin.com/">
        <figure>
          <img src="/linkedin-icon.svg" alt="" />
        </figure>
      </a>
    </div>

    <Teleport to="main">
      <transition name="downup">
        <div v-if="formActiv" class="rk_contactform">
          <div class="rk_content">
            <div class="cross" @click="formActiv = false"></div>

            <form action="">
              <div class="ctc_left">
                <h2>contact</h2>
              </div>
              <p>
                Nous vous invitons à remplir le formulaire de contact suivant
                pour toute demande d’information ou de devis. Nous vous
                répondrons dans les plus brefs délais.
              </p>
              <div class="rk_left">
                <input type="text" name="nom" placeholder="Nom*" />
                <input type="text" name="email" placeholder="Adresse mail*" />

                <input type="text" name="entreprise" placeholder="Entreprise" />
                <input type="text" name="objet" placeholder="Objet*" />
              </div>
              <div class="rk_right">
                <input type="text" name="prenom" placeholder="Prenom" />
                <input
                  type="number"
                  name="numero"
                  placeholder="Numéro de téléphone*"
                />
                <input type="text" name="poste" placeholder="Poste*" />
                <select name="service" id="pet-select">
                  <option selected disabled>Service concerné*</option>

                  <option value="tourisme">Tourisme</option>
                  <option value="metiers">Métiers de bouche</option>
                </select>
              </div>
              <textarea
                name="message"
                id=""
                cols="30"
                rows="10"
                placeholder="Votre message"
              ></textarea>
              <label for="submitBtn" class="submit">
                <input
                  type="submit"
                  id="submitBtn"
                  name="submitBtn"
                  value="Envoyer"
                />
                <div class="rk_arrow_circle light">
                  <span class="rk_arrow"></span>
                  <span class="rk_circle"></span>
                </div>
              </label>
            </form>
          </div>
        </div>
      </transition>
    </Teleport>
    <Teleport to="body" v-if="ready">
      <footer>
        <div class="rk_up">
          <figure>
            <img src="/logo-blanc.png" alt="logo solstys" />
          </figure>
          <div class="rk_contact" @click="formActiv = true">
            <h3 class="orange">Nous contacter</h3>
            <div class="rk_arrow_circle light">
              <span class="rk_arrow"></span>
              <span class="rk_circle"></span>
            </div>
          </div>
          <a class="linkedin" href="https://www.linkedin.com/">
            <figure>
              <img src="/linkedin-icon.svg" alt="" />
            </figure>
          </a>
        </div>
        <hr />
        <div class="rk_down">
          <div class="left">
            <a href="">Mentions légales</a>
            |
            <form method="get" target="_blank" action="/CGV.pdf">
              <button type="submit">CGV</button>
            </form>
          </div>
          <div class="right">
            <a href="">Création graphique & développement</a>
          </div>
        </div>
      </footer>
    </Teleport>
  </div>
</template>

<script setup>
import { ref } from "vue";

const formActiv = ref(false);
const ready = ref(false);

setTimeout(() => {
  ready.value = true;
}, 400);
</script>

<style lang="scss" scoped>
$maincolor: black;
$oposcolor: white;
$orange: #fb8c24;
$filet: #707070;
.rk_blackpage {
  overflow: hidden;
  min-height: 100vh;
  background-color: $maincolor;
  max-width: 100vw;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  h1 {
    color: $oposcolor;
  }
  h2 {
    color: $oposcolor;
    margin: 100px 0 0 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  h3:not(.orange) {
    color: $oposcolor;
    font-family: Futuralight;
    text-transform: uppercase;
    font-weight: 300;
    &::before {
      content: "";
      background-color: $oposcolor;
      width: 80px;
      display: inline-block;
      height: 1px;
      margin: 0 10px 0 40px;
    }
  }

  section {
    padding-top: 100px;
    max-width: 980px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    &.first {
      padding-top: 50px;
    }
    &:not(.noLine) {
      border-right: solid 1px $filet;
      border-left: solid 1px $filet;
    }

    &.rk_middle_sct {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    &.noLine {
      padding-bottom: 100px;

      padding-top: 0;
      h2 {
        text-align: center;
        display: block;
        margin-bottom: 40px;
      }
      h3 {
        color: $orange;
        font-family: Italiana;
        font-weight: 300;
        font-size: 35px;
        margin-top: 50px;
      }

      .three_col {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;

        > div {
          position: relative;
          flex: 0 0 auto;
          width: 31%;
          &::before {
            color: $oposcolor;
            font-family: Italiana;
            display: block;
            content: attr(numero);
            position: absolute;
            top: 0;
            left: 0;
          }
          &::after {
            background-color: $oposcolor;
            display: block;
            width: calc(80% - 30px);
            max-width: 200px;
            height: 1px;
            position: absolute;
            top: 13px;
            left: 30px;
            content: "";
          }
        }
        p {
          color: $oposcolor;
          font-family: Futuralight;
          font-size: 16px;
          line-height: 16px;
        }
      }
      @media screen and (max-width: 980px) {
        .three_col {
          justify-content: center;
          > div {
            width: 50%;
            margin: 20px;
          }
        }
      }
      @media screen and (max-width: 720px) {
        .three_col {
          > div {
            width: 70%;
          }
        }
      }
    }

    .rk_one,
    .rk_two {
      position: relative;
      z-index: 1;

      p {
        font-family: Italiana;
        color: $oposcolor;
        font-size: 70px;
        padding: 40px 0;
        margin: 0;
        position: relative;
        &:nth-child(3):before {
          position: absolute;
          top: 0;
          content: "";
          background-color: $oposcolor;
          width: 80px;
          display: inline-block;
          height: 1px;
        }
      }
    }
    .rk_two {
      margin-top: 15vh;

      transform: translateX(50%);
    }
    &.noLineCenter {
      padding-bottom: 100px;
      position: relative;

      &.nRight {
        border-right: 0;
      }

      h3 {
        color: $orange;
        font-family: Futuralight;
        font-weight: 300;
        text-transform: uppercase;
        font-size: 16px;
        margin-top: 40px;
      }
      .content {
        display: flex;
        h3,
        .rk_arrow_circle {
          cursor: pointer;
        }
        h3 {
          display: inline-block;
        }
        > div {
          width: 50%;
          display: flex;
          flex-direction: column;
          justify-content: center;
        }
      }
      p {
        color: $oposcolor;
        font-family: Futuralight;
        margin: 0;
        line-height: 20px;
        &.title {
          text-transform: uppercase;
        }
        &.docs {
          margin: 20px 0;
        }
      }
      hr {
        margin: 10px 0;
        width: 100px;
        &.slim {
          width: 5px;
        }
      }
      .downloads {
        display: flex;
        width: 150%;
        flex-wrap: nowrap;
        form {
          display: inline-block;
          width: 26%;
          max-width: 26vw;
          margin: 20px 30px 20px 0;
          button {
            display: block;
            height: 100%;
            background-color: transparent;
            border: solid 1px $orange;
            border-radius: 25px;
            color: $orange;
            padding: 10px;
            width: 100%;
            transition: all 0.4s;
            cursor: pointer;

            &:hover {
              background-color: $orange;
              color: $maincolor;
            }
          }
        }
      }
      img {
        max-width: 300px;
      }
    }

    .rk_left_txt {
      display: flex;
      position: absolute;
      left: 44%;
      top: 50%;
      align-items: end;
      transform: rotate(-90deg) translatey(-50vw);
      span {
        height: 1px;
        background-color: $oposcolor;
        width: 80px;
        margin: 0 10px 7px;
      }
      P {
        margin: 0;
        font-family: Futuralight;
        font-size: 18px;
        text-transform: uppercase;
        color: $oposcolor;
        transition: all 0.4s;
        width: 105px;
      }
    }
  }

  .rk_separator {
    height: 20vh;
    width: 100%;
    height: 100px;
    border-top: solid 1px $filet;
    &:not(.noBot) {
      border-bottom: solid 1px $filet;
    }

    .side {
      height: 100%;
      max-width: 980px;
      width: 100%;
      border-right: solid 1px $filet;
      border-left: solid 1px $filet;
      margin: auto;
    }
  }
  .rk_separator_line {
    width: 100%;
    height: 1px;
    border-top: solid 1px $filet;
  }
  section,
  .rk_separator {
    position: relative;
    &:not(.noLine, .noLineCenter) {
      &:after {
        content: "";
        height: 100%;
        border-right: solid 1px $filet;
        width: 1px;
        position: absolute;
        left: 50%;
        top: 0;
        transform: translateX(-50%);
        z-index: 0;
      }
    }
  }
  .rk_right_txt {
    position: fixed;
    top: 50%;
    transform: rotate(90deg) translatey(-80px);
    a {
      cursor: pointer;
    }
    figure {
      padding: 8.5px 10px;
      border: solid 2px $orange;
      border-radius: 50%;
      transform: rotate(-90deg) translatex(-25%);
      margin: 0;
      img {
        width: 20px;
      }
    }
  }
  .rk_home_btn {
    position: fixed;
    top: 100px;
    left: 60px;
    z-index: 3;
  }
}
@media screen and (max-width: 1280px) {
  .rk_blackpage {
    h2 {
      font-size: 50px;
      line-height: 35px;
    }
    .rk_home_btn {
      left: 5px;
    }
    .rk_right_txt {
      transform: rotate(90deg) translatey(-138px);
    }
    .rk_middle_sct {
      .rk_one,
      .rk_two {
        p {
          font-size: 40px;
        }
        .rk_deco_b {
          display: inline-block;
        }
      }
      .rk_one {
        .rk_deco_b {
          margin-left: 120px;
        }
      }
      .rk_two {
        transform: translateX(0%);
        display: flex;
        flex-direction: column;
        align-items: end;

        p {
          text-align: right;
          &:nth-child(3):before {
            right: 0;
          }
        }
      }
    }
  }
}

@media screen and (max-width: 1000px) {
  .rk_blackpage {
    padding: 0 60px;
    align-items: start;
    section,
    .rk_separator {
      max-width: calc(100% - 120px);
      .rk_left_txt {
        display: none;
      }
    }
    .rk_separator_line {
      transform: translateX(-60px);
    }
    section.noLineCenter {
      align-items: center;
      &.nRight {
        align-items: start;
        .content {
          margin-top: 40px;
          width: 100%;
          p {
            text-align: left;
          }
        }
      }
      h2 {
        margin-top: 0;
        justify-content: center;
      }
      p {
        text-align: center;
      }
      .downloads {
        width: 100%;
        flex-direction: column;
        align-items: center;
        form {
          margin-right: 0;
          max-width: 210px;
          width: 220px;
        }
      }
      img {
        width: 80%;
      }
    }
  }
}

@media screen and (max-width: 720px) {
  section,
  section:after,
  .rk_separator_line,
  .rk_separator,
  .rk_separator:after,
  .nRight:after,
  .rk_separator .side {
    border-color: transparent !important;
  }

  .nRight:after {
    background-color: transparent !important;
  }
  .rk_arrow_circle + .rk_deco_b {
    margin-left: 60px !important;
    padding-left: 15px;
    span {
      font-size: 42px;
      line-height: 50px;
    }
    &::after {
      bottom: inherit;
      top: 0;
    }
  }
  .rk_blackpage {
    .rk_right_txt {
      display: none;
    }
    h2 {
      flex-direction: column;
    }

    .rk_middle_sct {
      padding-top: 0;
      h3 {
        padding-left: 10px;
        &:not(.orange)::before {
          display: none;
        }
      }
      .rk_one,
      .rk_two {
        align-items: start;
        p {
          width: 100%;
          text-align: left;
          &:before {
            right: inherit;
            left: 0;
          }
        }
        .rk_deco_b {
          margin-left: 120px;
        }
        h4 {
          font-size: 55px;
        }
        .upSplit {
          h3 {
            padding-left: 0;
          }
        }
      }
      .rk_deco_b {
        position: relative;
        margin-left: 60px;
        &:before {
          display: block !important;
          content: "";
          width: 120px;
          height: 1px;
          background-color: white;
          position: absolute;
          bottom: 4px;
          left: 0;
          transform: translateX(-160px) !important;
        }
        &:after {
          transform: translateX(-100%) translateY(-15px);
        }
      }
    }
    section.noLine {
      h2 {
        font-size: 50px !important;
        margin-top: 0;
      }
      .three_col > div {
        width: 100%;
      }
    }
    section {
      .rk_left_txt {
        transform: rotate(-90deg) translatey(calc(-50vw - 30px));
      }
    }
    .noLineCenter {
      padding-top: 0;
      .content {
        width: 100% !important;

        flex-direction: column;

        > div {
          margin-bottom: 20px;
          width: 100% !important;
          p {
            text-align: left;
          }
        }
      }
    }
    section.noLine .three_col > div::after {
      width: calc(100% - 30px);
      max-width: inherit;
    }
  }
  .rk_home_btn {
    display: none;
  }
}
</style>
