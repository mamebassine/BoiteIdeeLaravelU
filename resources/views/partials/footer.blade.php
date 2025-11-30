<style>
    :root {
        --text: #000;
        --muted: #6F6F6F;

        --primary: #00B894;
        --primary-dark: #009975;
        --accent: #FF6B6B;
    }

    footer {
        background: var(--primary); /* Couleur principale */
        color: var(--text);
        padding: 40px 0;
        margin-top: 60px;
        text-align: center;
    }

    footer p {
        margin: 0;
        padding: 4px 0;
        font-size: 15px;
    }

    footer .small {
        font-size: 13px;
        color: var(--muted);
    }

    /* Ligne décorative */
    .footer-line {
        width: 60px;
        height: 3px;
        background: var(--accent); /* Couleur accent */
        margin: 10px auto 20px auto;
        border-radius: 4px;
    }

    /* Hover optionnel si un jour tu ajoutes des liens */
    footer a:hover {
        color: var(--primary-dark);
    }

    /* Responsive */
    @media (max-width: 768px) {
        footer {
            padding: 30px 0;
        }
        footer p {
            font-size: 14px;
        }
    }
</style>

<footer>
    <div class="container text-center">
        <div class="footer-line"></div>

        <p>© {{ date('Y') }} Boîte à Idées — Tous droits réservés</p>
        <p class="small">Développé avec ❤️ sous Laravel</p>
    </div>
</footer>
