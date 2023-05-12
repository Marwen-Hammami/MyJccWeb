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

/* templateBackOffice/loading.html.twig */
class __TwigTemplate_9870c6b742db89bf47b15898e9d65af1fd45c9992b6af863018509f8707fd715 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templateBackOffice/loading.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templateBackOffice/loading.html.twig"));

        // line 2
        echo "<!-- Animation roue de chargement, mais ralentit le chargement des pages de 0.7s à 1.1 : Utile pour les pages qui chargent avant les données -->
\t<div id=\"preloader\"> <div id=\"status\">
\t\t<div class=\"spinner-chase\">
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t</div>
\t</div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "templateBackOffice/loading.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# {{ include('templateBackOffice/loading.html.twig') }} #}
<!-- Animation roue de chargement, mais ralentit le chargement des pages de 0.7s à 1.1 : Utile pour les pages qui chargent avant les données -->
\t<div id=\"preloader\"> <div id=\"status\">
\t\t<div class=\"spinner-chase\">
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t\t<div class=\"chase-dot\"></div>
\t\t</div>
\t</div>
</div>
", "templateBackOffice/loading.html.twig", "C:\\Users\\hiche\\OneDrive\\Bureau\\Symfony-Blog-main\\Symfony-Blog-main\\templates\\templateBackOffice\\loading.html.twig");
    }
}
