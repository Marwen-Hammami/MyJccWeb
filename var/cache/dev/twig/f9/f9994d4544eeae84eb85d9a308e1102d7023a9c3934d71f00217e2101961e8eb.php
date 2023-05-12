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

/* templateBackOffice/topBar.html.twig */
class __TwigTemplate_a97ce81ae3ec02957963328cf12f4971d4766a31f31b1e956db5c88d8c24996f extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templateBackOffice/topBar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templateBackOffice/topBar.html.twig"));

        // line 2
        echo "
<header id=\"page-topbar\">
\t<div class=\"navbar-header\">
\t\t<div
\t\t\tclass=\"d-flex\">
\t\t\t<!-- LOGO -->
\t\t\t<div class=\"navbar-brand-box\">
\t\t\t\t<a href=\"#\" class=\"logo logo-light\">
\t\t\t\t\t<span class=\"logo-sm\">
\t\t\t\t\t\t<img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/myjccLogo.png"), "html", null, true);
        echo "\" alt=\"\" height=\"22\"/>
\t\t\t\t\t</span>
\t\t\t\t\t<span class=\"logo-lg\">
\t\t\t\t\t\t<img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/myjccLarge.png"), "html", null, true);
        echo "\" alt=\"\" height=\"19\"/>
\t\t\t\t\t</span>
\t\t\t\t</a>
\t\t\t</div>

\t\t\t<button type=\"button\" class=\"btn btn-sm px-3 font-size-16 header-item waves-effect\" id=\"vertical-menu-btn\">
\t\t\t\t<i class=\"fa fa-fw fa-bars\"></i>
\t\t\t</button>
\t\t</div>

\t\t<div class=\"d-flex\">
\t\t\t<div class=\"dropdown d-none d-lg-inline-block ms-1\">
\t\t\t\t<button type=\"button\" class=\"btn header-item noti-icon waves-effect\" data-bs-toggle=\"fullscreen\">
\t\t\t\t\t<i class=\"bx bx-fullscreen\"></i>
\t\t\t\t</button>
\t\t\t</div>

\t\t\t<div class=\"dropdown d-inline-block\">
\t\t\t\t<button type=\"button\" class=\"btn header-item waves-effect\" id=\"page-header-user-dropdown\" data-bs-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t<img class=\"rounded-circle header-profile-user\" src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/users/avatar-1.jpg"), "html", null, true);
        echo "\" alt=\"Header Avatar\"/>
\t\t\t\t\t<span class=\"d-none d-xl-inline-block ms-1\" key=\"t-henry\">Henry</span>
\t\t\t\t\t<i class=\"mdi mdi-chevron-down d-none d-xl-inline-block\"></i>
\t\t\t\t</button>
\t\t\t\t<div
\t\t\t\t\tclass=\"dropdown-menu dropdown-menu-end\">
\t\t\t\t\t<!-- item-->
\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">
\t\t\t\t\t\t<i class=\"bx bx-user font-size-16 align-middle me-1\"></i>
\t\t\t\t\t\t<span key=\"t-profile\">Profile</span>
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"dropdown-divider\"></div>
\t\t\t\t\t<a class=\"dropdown-item text-danger\" href=\"#\">
\t\t\t\t\t\t<i class=\"bx bx-power-off font-size-16 align-middle me-1 text-danger\"></i>
\t\t\t\t\t\t<span key=\"t-logout\">Logout</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>


\t\t</div>
\t</div>
</header>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "templateBackOffice/topBar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 33,  60 => 14,  54 => 11,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# {{ include('templateBackOffice/topBar.html.twig') }} #}

<header id=\"page-topbar\">
\t<div class=\"navbar-header\">
\t\t<div
\t\t\tclass=\"d-flex\">
\t\t\t<!-- LOGO -->
\t\t\t<div class=\"navbar-brand-box\">
\t\t\t\t<a href=\"#\" class=\"logo logo-light\">
\t\t\t\t\t<span class=\"logo-sm\">
\t\t\t\t\t\t<img src=\"{{ asset('images/myjccLogo.png') }}\" alt=\"\" height=\"22\"/>
\t\t\t\t\t</span>
\t\t\t\t\t<span class=\"logo-lg\">
\t\t\t\t\t\t<img src=\"{{ asset('images/myjccLarge.png') }}\" alt=\"\" height=\"19\"/>
\t\t\t\t\t</span>
\t\t\t\t</a>
\t\t\t</div>

\t\t\t<button type=\"button\" class=\"btn btn-sm px-3 font-size-16 header-item waves-effect\" id=\"vertical-menu-btn\">
\t\t\t\t<i class=\"fa fa-fw fa-bars\"></i>
\t\t\t</button>
\t\t</div>

\t\t<div class=\"d-flex\">
\t\t\t<div class=\"dropdown d-none d-lg-inline-block ms-1\">
\t\t\t\t<button type=\"button\" class=\"btn header-item noti-icon waves-effect\" data-bs-toggle=\"fullscreen\">
\t\t\t\t\t<i class=\"bx bx-fullscreen\"></i>
\t\t\t\t</button>
\t\t\t</div>

\t\t\t<div class=\"dropdown d-inline-block\">
\t\t\t\t<button type=\"button\" class=\"btn header-item waves-effect\" id=\"page-header-user-dropdown\" data-bs-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t<img class=\"rounded-circle header-profile-user\" src=\"{{ asset('images/users/avatar-1.jpg') }}\" alt=\"Header Avatar\"/>
\t\t\t\t\t<span class=\"d-none d-xl-inline-block ms-1\" key=\"t-henry\">Henry</span>
\t\t\t\t\t<i class=\"mdi mdi-chevron-down d-none d-xl-inline-block\"></i>
\t\t\t\t</button>
\t\t\t\t<div
\t\t\t\t\tclass=\"dropdown-menu dropdown-menu-end\">
\t\t\t\t\t<!-- item-->
\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">
\t\t\t\t\t\t<i class=\"bx bx-user font-size-16 align-middle me-1\"></i>
\t\t\t\t\t\t<span key=\"t-profile\">Profile</span>
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"dropdown-divider\"></div>
\t\t\t\t\t<a class=\"dropdown-item text-danger\" href=\"#\">
\t\t\t\t\t\t<i class=\"bx bx-power-off font-size-16 align-middle me-1 text-danger\"></i>
\t\t\t\t\t\t<span key=\"t-logout\">Logout</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>


\t\t</div>
\t</div>
</header>
", "templateBackOffice/topBar.html.twig", "C:\\Users\\hiche\\OneDrive\\Bureau\\Symfony-Blog-main\\Symfony-Blog-main\\templates\\templateBackOffice\\topBar.html.twig");
    }
}
