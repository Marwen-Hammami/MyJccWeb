<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* templateFrontOffice/topBar.html.twig */
class __TwigTemplate_d62d82aff921907759282b5bce8dd424e4f9b0cb4d6d088347ce272e83c1a623 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templateFrontOffice/topBar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templateFrontOffice/topBar.html.twig"));

        // line 1
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1, $this->source); })()), "session", [], "any", false, false, false, 1), "get", [0 => "user"], "method", false, false, false, 1);
        // line 2
        echo "<header id=\"gen-header\" class=\"gen-header-style-1 gen-has-sticky\">
\t<div class=\"gen-bottom-header\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t<nav class=\"navbar navbar-expand-lg navbar-light\">
\t\t\t\t\t\t<a class=\"navbar-brand\" href=\"#\">
\t\t\t\t\t\t\t<img class=\"img-fluid logo\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/myjccLarge1.png"), "html", null, true);
        echo "\" alt=\"streamlab-image\">
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
\t\t\t\t\t\t\t<div id=\"gen-menu-contain\" class=\"gen-menu-contain\">
\t\t\t\t\t\t\t\t<ul id=\"gen-main-menu\" class=\"navbar-nav ml-auto\">
\t\t\t\t\t\t\t\t\t<li class=\"menu-item\">
\t\t\t\t\t\t\t\t\t\t<a href=></a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li class=\"menu-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\" aria-current=\"page\">Mes Réservations</a>
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-chevron-down gen-submenu-icon\"></i>
\t\t\t\t\t\t\t\t\t\t<ul class=\"sub-menu\">
\t\t\t\t\t\t\t\t\t\t\t<li class=\"menu-item\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"\" aria-current=\"page\">Hotel</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li class=\"menu-item\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"\"  aria-current=\"page\">Vehicule</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"gen-header-info-box\">
\t\t\t\t\t\t\t<div class=\"gen-menu-search-block\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" id=\"gen-seacrh-btn\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-search\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<div class=\"gen-search-form\">
\t\t\t\t\t\t\t\t\t<form role=\"search\" method=\"get\" class=\"search-form\" action=\"#\">
\t\t\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"screen-reader-text\"></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"search\" class=\"search-field\" placeholder=\"Search …\" value=\"\" name=\"s\">
\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"search-submit\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"screen-reader-text\"></span>
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"gen-account-holder\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" id=\"gen-user-btn\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<div class=\"gen-account-menu\">
\t\t\t\t\t\t\t\t\t<ul class=\"gen-account-menu\">
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fas fa-sign-in-alt\"></i>
\t\t\t\t\t\t\t\t\t\t\t\tSe Connecter
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"register.html\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t\t\t\t\t\tParametres
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fas fa-sign-in-alt\"></i>
\t\t\t\t\t\t\t\t\t\t\t\tSe Déconnecter
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"gen-btn-container\">
\t\t\t\t\t\t\t\t<a href=\"register.html\" class=\"gen-button\">
\t\t\t\t\t\t\t\t\t<div class=\"gen-button-block\">
\t\t\t\t\t\t\t\t\t\t<span class=\"gen-button-line-left\"></span>
\t\t\t\t\t\t\t\t\t\t<span class=\"gen-button-text\">S'inscrire</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t\t<i class=\"fas fa-bars\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</nav>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</header>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "templateFrontOffice/topBar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 9,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set user = app.session.get('user') %}
<header id=\"gen-header\" class=\"gen-header-style-1 gen-has-sticky\">
\t<div class=\"gen-bottom-header\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t<nav class=\"navbar navbar-expand-lg navbar-light\">
\t\t\t\t\t\t<a class=\"navbar-brand\" href=\"#\">
\t\t\t\t\t\t\t<img class=\"img-fluid logo\" src=\"{{ asset('images/myjccLarge1.png') }}\" alt=\"streamlab-image\">
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
\t\t\t\t\t\t\t<div id=\"gen-menu-contain\" class=\"gen-menu-contain\">
\t\t\t\t\t\t\t\t<ul id=\"gen-main-menu\" class=\"navbar-nav ml-auto\">
\t\t\t\t\t\t\t\t\t<li class=\"menu-item\">
\t\t\t\t\t\t\t\t\t\t<a href=></a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li class=\"menu-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\" aria-current=\"page\">Mes Réservations</a>
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-chevron-down gen-submenu-icon\"></i>
\t\t\t\t\t\t\t\t\t\t<ul class=\"sub-menu\">
\t\t\t\t\t\t\t\t\t\t\t<li class=\"menu-item\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"\" aria-current=\"page\">Hotel</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li class=\"menu-item\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"\"  aria-current=\"page\">Vehicule</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"gen-header-info-box\">
\t\t\t\t\t\t\t<div class=\"gen-menu-search-block\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" id=\"gen-seacrh-btn\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-search\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<div class=\"gen-search-form\">
\t\t\t\t\t\t\t\t\t<form role=\"search\" method=\"get\" class=\"search-form\" action=\"#\">
\t\t\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"screen-reader-text\"></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"search\" class=\"search-field\" placeholder=\"Search …\" value=\"\" name=\"s\">
\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"search-submit\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"screen-reader-text\"></span>
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"gen-account-holder\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" id=\"gen-user-btn\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<div class=\"gen-account-menu\">
\t\t\t\t\t\t\t\t\t<ul class=\"gen-account-menu\">
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fas fa-sign-in-alt\"></i>
\t\t\t\t\t\t\t\t\t\t\t\tSe Connecter
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"register.html\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t\t\t\t\t\tParametres
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fas fa-sign-in-alt\"></i>
\t\t\t\t\t\t\t\t\t\t\t\tSe Déconnecter
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"gen-btn-container\">
\t\t\t\t\t\t\t\t<a href=\"register.html\" class=\"gen-button\">
\t\t\t\t\t\t\t\t\t<div class=\"gen-button-block\">
\t\t\t\t\t\t\t\t\t\t<span class=\"gen-button-line-left\"></span>
\t\t\t\t\t\t\t\t\t\t<span class=\"gen-button-text\">S'inscrire</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t\t<i class=\"fas fa-bars\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</nav>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</header>", "templateFrontOffice/topBar.html.twig", "C:\\Users\\hiche\\OneDrive\\Bureau\\Symfony-Blog-main\\Symfony-Blog-main\\templates\\templateFrontOffice\\topBar.html.twig");
    }
}
