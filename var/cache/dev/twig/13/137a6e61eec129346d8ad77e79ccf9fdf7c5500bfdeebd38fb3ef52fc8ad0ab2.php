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

/* templateBackOffice/leftSideBar.html.twig */
class __TwigTemplate_ddc630ed3ca21ec2248e5f8dfa65860b59f0c97b40dcea73ca008818d531a8f9 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templateBackOffice/leftSideBar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templateBackOffice/leftSideBar.html.twig"));

        // line 2
        echo "<div class=\"vertical-menu\">
\t<div
\t\tdata-simplebar class=\"h-100\">
\t\t<!--- Sidemenu -->
\t\t<div
\t\t\tid=\"sidebar-menu\">
\t\t\t<!-- Left Menu Start -->
\t\t\t<ul class=\"metismenu list-unstyled\" id=\"side-menu\">
\t\t\t\t<li class=\"menu-title\" key=\"t-menu\">Menu</li>

\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t";
        // line 16
        echo "\t\t\t\t\t\t<span key=\"t-dashboards\">Hotels</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t";
        // line 31
        echo "\t\t\t\t\t\t<span key=\"t-dashboards\">les reservations hotels</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t";
        // line 46
        echo "\t\t\t\t\t\t<span key=\"t-dashboards\">Vehicules</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t";
        // line 61
        echo "\t\t\t\t\t\t<span key=\"t-dashboards\">Blog</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t";
        // line 76
        echo "\t\t\t\t\t\t<span key=\"t-dashboards\">Locations des Vehicules</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>

\t\t\t</ul>
\t\t</div>
\t\t<!-- Sidebar -->
\t</div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "templateBackOffice/leftSideBar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  122 => 76,  106 => 61,  90 => 46,  74 => 31,  58 => 16,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# {{ include('templateBackOffice/leftSideBar.html.twig') }} #}
<div class=\"vertical-menu\">
\t<div
\t\tdata-simplebar class=\"h-100\">
\t\t<!--- Sidemenu -->
\t\t<div
\t\t\tid=\"sidebar-menu\">
\t\t\t<!-- Left Menu Start -->
\t\t\t<ul class=\"metismenu list-unstyled\" id=\"side-menu\">
\t\t\t\t<li class=\"menu-title\" key=\"t-menu\">Menu</li>

\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t{# <span class=\"badge rounded-pill bg-info float-end\">04</span> #}
\t\t\t\t\t\t<span key=\"t-dashboards\">Hotels</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t{# <span class=\"badge rounded-pill bg-info float-end\">04</span> #}
\t\t\t\t\t\t<span key=\"t-dashboards\">les reservations hotels</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t{# <span class=\"badge rounded-pill bg-info float-end\">04</span> #}
\t\t\t\t\t\t<span key=\"t-dashboards\">Vehicules</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t{# <span class=\"badge rounded-pill bg-info float-end\">04</span> #}
\t\t\t\t\t\t<span key=\"t-dashboards\">Blog</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"waves-effect\">
\t\t\t\t\t\t<i class=\"bx bx-home-circle\"></i>
\t\t\t\t\t\t{# <span class=\"badge rounded-pill bg-info float-end\">04</span> #}
\t\t\t\t\t\t<span key=\"t-dashboards\">Locations des Vehicules</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"sub-menu\" aria-expanded=\"false\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-default\">Liste</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\" key=\"t-saas\">Ajouter</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>

\t\t\t</ul>
\t\t</div>
\t\t<!-- Sidebar -->
\t</div>
</div>
", "templateBackOffice/leftSideBar.html.twig", "C:\\Users\\hiche\\OneDrive\\Bureau\\Symfony-Blog-main\\Symfony-Blog-main\\templates\\templateBackOffice\\leftSideBar.html.twig");
    }
}
