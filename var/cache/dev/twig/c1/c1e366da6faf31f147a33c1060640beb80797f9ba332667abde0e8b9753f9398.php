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

/* post/front.html.twig */
class __TwigTemplate_c5a74d9e065a102972bd8c7684d9884eb6ef8e988681c893fc9ed17b0564db1d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "baseFrontOffice.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/front.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/front.html.twig"));

        $this->parent = $this->loadTemplate("baseFrontOffice.html.twig", "post/front.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo " Home ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "    
        <div class=\"row my-3 \">
            <div class=\"row col-8 position-relative blog-post-list\">
                ";
        // line 8
        if ((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 8, $this->source); })())) {
            // line 9
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 9, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 10
                echo "                        <div class=\"col-12 mb-3 bg-white py-2\">
                            <div class=\"\">
                                <div class=\"d-flex text-center justify-content-between position-relative\">
                                    <h3 class=\"mb-0\">";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 13), "html", null, true);
                echo "</h3>
                                    ";
                // line 14
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 14), "roles", [], "any", true, true, false, 14) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "roles", [], "any", false, false, false, 14)))) {
                    // line 15
                    echo "                                        ";
                    if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "user", [], "any", false, false, false, 15), "roles", [], "any", false, false, false, 15))) {
                        // line 16
                        echo "                                            <span onclick=\"clickEdit('post', ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 16), "html", null, true);
                        echo ", event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                                            <div class=\"edit-menu edit-menu_";
                        // line 17
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 17), "html", null, true);
                        echo " d-none\"></div>
                                        ";
                    } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 18
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "user", [], "any", false, false, false, 18), "id", [], "any", false, false, false, 18) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 18), "id", [], "any", false, false, false, 18))) {
                        // line 19
                        echo "                                            <span onclick=\"clickEdit('post', ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 19), "html", null, true);
                        echo ", event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                                            <div class=\"edit-menu edit-menu_";
                        // line 20
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 20), "html", null, true);
                        echo " d-none\"></div>
                                        ";
                    } else {
                        // line 22
                        echo "                                        ";
                    }
                    // line 23
                    echo "                                    ";
                }
                // line 24
                echo "                                </div>
                                <em class=\"d-block mb-2 text-secondary\">
                                    <small>
                                        ";
                // line 27
                if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 27), "roles", [], "any", false, false, false, 27))) {
                    // line 28
                    echo "                                            Admin:
                                        ";
                } else {
                    // line 30
                    echo "                                            User:
                                        ";
                }
                // line 32
                echo "                                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 32), "username", [], "any", false, false, false, 32), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "postdate", [], "any", false, false, false, 32), "d-m-Y"), "html", null, true);
                echo "
                                    </small>
                                </em>
                                ";
                // line 35
                if (twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 35)) {
                    // line 36
                    echo "                                    <img src=\"";
                    echo twig_escape_filter($this->env, ("/assets/images/" . twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 36)), "html", null, true);
                    echo "\" class=\"d-block blog-list-img m-auto\" />
                                ";
                }
                // line 38
                echo "                                <p class=\"text-break\"> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "description", [], "any", false, false, false, 38), "html", null, true);
                echo " <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show_post", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 38)]), "html", null, true);
                echo "\"><small><em>Read more..</em></small></a>  </p>
                            </div>
                            ";
                // line 41
                echo "                            <div class=\"bottom-post d-flex justify-content-between\">
                                <div>
                                ";
                // line 43
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
                    // line 44
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("like_post", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 44)]), "html", null, true);
                    echo "\"><i class=\"fas fa-heart text-secondary\"></i></a>
                                ";
                } else {
                    // line 46
                    echo "                                    <i class=\"fas fa-heart text-secondary\"></i>
                                ";
                }
                // line 48
                echo "                                    <small class=\"text-secondary\">
                                        ";
                // line 49
                if (twig_get_attribute($this->env, $this->source, $context["post"], "likescount", [], "any", false, false, false, 49)) {
                    echo " ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "likescount", [], "any", false, false, false, 49), "html", null, true);
                    echo "
                                        ";
                } else {
                    // line 50
                    echo " 0
                                        ";
                }
                // line 52
                echo "                                    </small>
                                </div>
                                <a href=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show_post", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 54)]), "html", null, true);
                echo "\" class=\"text-secondary text-decoration-none\">
                                ";
                // line 55
                if (twig_get_attribute($this->env, $this->source, $context["post"], "commentscount", [], "any", false, false, false, 55)) {
                    // line 56
                    echo "                                <small><em>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "commentscount", [], "any", false, false, false, 56), "html", null, true);
                    echo " Comments</em></small></a>
                                ";
                } else {
                    // line 58
                    echo "                                 <small><em>0 Comments</em></small></a>
                                ";
                }
                // line 60
                echo "
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "                ";
        } else {
            // line 65
            echo "                    <p class=\"text-danger position-absolute top-50 text-center start-50 translate-middle\"> No posts Found! </p>
                ";
        }
        // line 67
        echo "                <div class=\"pagination_custom-style\">
                    ";
        // line 68
        echo $this->extensions['Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension']->render($this->env, (isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 68, $this->source); })()));
        echo "
                </div>
            </div>

          
        </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "post/front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 68,  247 => 67,  243 => 65,  240 => 64,  231 => 60,  227 => 58,  221 => 56,  219 => 55,  215 => 54,  211 => 52,  207 => 50,  200 => 49,  197 => 48,  193 => 46,  187 => 44,  185 => 43,  181 => 41,  173 => 38,  167 => 36,  165 => 35,  156 => 32,  152 => 30,  148 => 28,  146 => 27,  141 => 24,  138 => 23,  135 => 22,  130 => 20,  125 => 19,  123 => 18,  119 => 17,  114 => 16,  111 => 15,  109 => 14,  105 => 13,  100 => 10,  95 => 9,  93 => 8,  88 => 5,  78 => 4,  59 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'baseFrontOffice.html.twig' %}
{% block title %} Home {% endblock %}

{% block body %}
    
        <div class=\"row my-3 \">
            <div class=\"row col-8 position-relative blog-post-list\">
                {% if posts %}
                    {% for post in posts %}
                        <div class=\"col-12 mb-3 bg-white py-2\">
                            <div class=\"\">
                                <div class=\"d-flex text-center justify-content-between position-relative\">
                                    <h3 class=\"mb-0\">{{ post.title }}</h3>
                                    {% if app.user.roles is defined and app.user.roles is not null %}
                                        {% if \"admin\" in app.user.roles %}
                                            <span onclick=\"clickEdit('post', {{post.id}}, event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                                            <div class=\"edit-menu edit-menu_{{post.id}} d-none\"></div>
                                        {% elseif app.user.id == post.user.id %}
                                            <span onclick=\"clickEdit('post', {{post.id}}, event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                                            <div class=\"edit-menu edit-menu_{{post.id}} d-none\"></div>
                                        {% else %}
                                        {% endif %}
                                    {% endif %}
                                </div>
                                <em class=\"d-block mb-2 text-secondary\">
                                    <small>
                                        {% if \"admin\" in post.user.roles %}
                                            Admin:
                                        {% else %}
                                            User:
                                        {% endif %}
                                        {{post.user.username}} - {{ post.postdate|date('d-m-Y') }}
                                    </small>
                                </em>
                                {% if post.image %}
                                    <img src=\"{{ '/assets/images/' ~ post.image }}\" class=\"d-block blog-list-img m-auto\" />
                                {% endif %}
                                <p class=\"text-break\"> {{ post.description }} <a href=\"{{ path(\"show_post\", {id:post.id}) }}\"><small><em>Read more..</em></small></a>  </p>
                            </div>
                            {# Likes #}
                            <div class=\"bottom-post d-flex justify-content-between\">
                                <div>
                                {% if is_granted('IS_AUTHENTICATED_FULLY') %}
                                    <a href=\"{{ path(\"like_post\", {id:post.id}) }}\"><i class=\"fas fa-heart text-secondary\"></i></a>
                                {% else %}
                                    <i class=\"fas fa-heart text-secondary\"></i>
                                {% endif %}
                                    <small class=\"text-secondary\">
                                        {% if post.likescount %} {{post.likescount}}
                                        {% else %} 0
                                        {% endif %}
                                    </small>
                                </div>
                                <a href=\"{{ path(\"show_post\", {id:post.id}) }}\" class=\"text-secondary text-decoration-none\">
                                {% if post.commentscount %}
                                <small><em>{{post.commentscount}} Comments</em></small></a>
                                {% else %}
                                 <small><em>0 Comments</em></small></a>
                                {% endif %}

                            </div>
                        </div>
                    {% endfor %}
                {% else %}
                    <p class=\"text-danger position-absolute top-50 text-center start-50 translate-middle\"> No posts Found! </p>
                {% endif %}
                <div class=\"pagination_custom-style\">
                    {{ knp_pagination_render(posts) }}
                </div>
            </div>

          
        </div>

{% endblock %}", "post/front.html.twig", "C:\\Users\\hiche\\OneDrive\\Bureau\\Symfony-Blog-main\\Symfony-Blog-main\\templates\\post\\front.html.twig");
    }
}
