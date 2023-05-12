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

/* post/index.html.twig */
class __TwigTemplate_74207b1a58e8283d4ded0aad461df3e30b77c7b00e216ec71b47bf5ba937a683 extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "post/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
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

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    
        <div class=\"row my-3 \">
            <div class=\"row col-8 position-relative blog-post-list\">
                ";
        // line 9
        if ((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 9, $this->source); })())) {
            // line 10
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 10, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 11
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("edit_post", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 11)]), "html", null, true);
                echo "\">edit</i></a>
                                            <a href=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_post", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 12)]), "html", null, true);
                echo "\">delete</i></a>
                        <div class=\"col-12 mb-3 bg-white py-2\">
                            <div class=\"\">
                                <div class=\"d-flex text-center justify-content-between position-relative\">
                                    <h3 class=\"mb-0\">";
                // line 16
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 16), "html", null, true);
                echo "</h3>
                                    ";
                // line 17
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 17), "roles", [], "any", true, true, false, 17) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "user", [], "any", false, false, false, 17), "roles", [], "any", false, false, false, 17)))) {
                    // line 18
                    echo "                                        ";
                    if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "user", [], "any", false, false, false, 18), "roles", [], "any", false, false, false, 18))) {
                        // line 19
                        echo "                                            <span onclick=\"clickEdit('post', ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 19), "html", null, true);
                        echo ", event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                                            <div class=\"edit-menu edit-menu_";
                        // line 20
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 20), "html", null, true);
                        echo " d-none\"></div>
                                        ";
                    } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 21
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "user", [], "any", false, false, false, 21), "id", [], "any", false, false, false, 21) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 21), "id", [], "any", false, false, false, 21))) {
                        // line 22
                        echo "                                            <span onclick=\"clickEdit('post', ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 22), "html", null, true);
                        echo ", event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                                            <div class=\"edit-menu edit-menu_";
                        // line 23
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 23), "html", null, true);
                        echo " d-none\"></div>
                                            
                                        ";
                    } else {
                        // line 26
                        echo "                                        ";
                    }
                    // line 27
                    echo "                                    ";
                }
                // line 28
                echo "                                </div>
                                <em class=\"d-block mb-2 text-secondary\">
                                    <small>
                                        ";
                // line 31
                if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 31), "roles", [], "any", false, false, false, 31))) {
                    // line 32
                    echo "                                            Admin:
                                        ";
                } else {
                    // line 34
                    echo "                                            User:
                                        ";
                }
                // line 36
                echo "                                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 36), "username", [], "any", false, false, false, 36), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "postdate", [], "any", false, false, false, 36), "d-m-Y"), "html", null, true);
                echo "
                                    </small>
                                </em>
                                ";
                // line 39
                if (twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 39)) {
                    // line 40
                    echo "                                    <img src=\"";
                    echo twig_escape_filter($this->env, ("/assets/images/" . twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 40)), "html", null, true);
                    echo "\" class=\"d-block blog-list-img m-auto\" />
                                ";
                }
                // line 42
                echo "                                <p class=\"text-break\"> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "description", [], "any", false, false, false, 42), "html", null, true);
                echo " <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show_post", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 42)]), "html", null, true);
                echo "\"><small><em>Read more..</em></small></a>  </p>
                            </div>
                            ";
                // line 45
                echo "                            <div class=\"bottom-post d-flex justify-content-between\">
                                <div>
                                ";
                // line 47
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
                    // line 48
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("like_post", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 48)]), "html", null, true);
                    echo "\"><i class=\"fas fa-heart text-secondary\"></i></a>
                                ";
                } else {
                    // line 50
                    echo "                                    <i class=\"fas fa-heart text-secondary\"></i>
                                ";
                }
                // line 52
                echo "                                    <small class=\"text-secondary\">
                                        ";
                // line 53
                if (twig_get_attribute($this->env, $this->source, $context["post"], "likescount", [], "any", false, false, false, 53)) {
                    echo " ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "likescount", [], "any", false, false, false, 53), "html", null, true);
                    echo "
                                        ";
                } else {
                    // line 54
                    echo " 0
                                        ";
                }
                // line 56
                echo "                                    </small>
                                </div>
                                <a href=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show_post", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 58)]), "html", null, true);
                echo "\" class=\"text-secondary text-decoration-none\">
                                ";
                // line 59
                if (twig_get_attribute($this->env, $this->source, $context["post"], "commentscount", [], "any", false, false, false, 59)) {
                    // line 60
                    echo "                                <small><em>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "commentscount", [], "any", false, false, false, 60), "html", null, true);
                    echo " Comments</em></small></a>
                                ";
                } else {
                    // line 62
                    echo "                                 <small><em>0 Comments</em></small></a>
                                ";
                }
                // line 64
                echo "
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "                ";
        } else {
            // line 69
            echo "                    <p class=\"text-danger position-absolute top-50 text-center start-50 translate-middle\"> No posts Found! </p>
                ";
        }
        // line 71
        echo "                <div class=\"pagination_custom-style\">
                    ";
        // line 72
        echo $this->extensions['Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension']->render($this->env, (isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 72, $this->source); })()));
        echo "
                </div>
            </div>

            ";
        // line 76
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 77
            echo "                <div class=\"sidebar col-4 ms-3 py-3 bg-white\">
                    <h4 class=\"second-color mb-3\">Create Post</h4>
                    ";
            // line 79
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), 'form');
            echo "
                </div>
            ";
        } else {
            // line 82
            echo "                <div class=\"sidebar col-4 ms-3 py-5 bg-white text-center\">
                    <small class=\"d-block mb-3\">
                        Sign-up or Login to share your posts!
                    </small>
                    <div>
                        <a href=\"";
            // line 87
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("register");
            echo "\" class=\"text-decoration-none me-3\">Register</a>
                        <a href=\"";
            // line 88
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            echo "\" class=\"text-decoration-none\">Login</a>
                    </div>
                    
                </div>
            ";
        }
        // line 93
        echo "        </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "post/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  296 => 93,  288 => 88,  284 => 87,  277 => 82,  271 => 79,  267 => 77,  265 => 76,  258 => 72,  255 => 71,  251 => 69,  248 => 68,  239 => 64,  235 => 62,  229 => 60,  227 => 59,  223 => 58,  219 => 56,  215 => 54,  208 => 53,  205 => 52,  201 => 50,  195 => 48,  193 => 47,  189 => 45,  181 => 42,  175 => 40,  173 => 39,  164 => 36,  160 => 34,  156 => 32,  154 => 31,  149 => 28,  146 => 27,  143 => 26,  137 => 23,  132 => 22,  130 => 21,  126 => 20,  121 => 19,  118 => 18,  116 => 17,  112 => 16,  105 => 12,  100 => 11,  95 => 10,  93 => 9,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %} Home {% endblock %}

{% block body %}
    
        <div class=\"row my-3 \">
            <div class=\"row col-8 position-relative blog-post-list\">
                {% if posts %}
                    {% for post in posts %}
                    <a href=\"{{ path(\"edit_post\", {id:post.id}) }}\">edit</i></a>
                                            <a href=\"{{ path(\"delete_post\", {id:post.id}) }}\">delete</i></a>
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

            {% if is_granted('IS_AUTHENTICATED_FULLY') %}
                <div class=\"sidebar col-4 ms-3 py-3 bg-white\">
                    <h4 class=\"second-color mb-3\">Create Post</h4>
                    {{form(form)}}
                </div>
            {% else %}
                <div class=\"sidebar col-4 ms-3 py-5 bg-white text-center\">
                    <small class=\"d-block mb-3\">
                        Sign-up or Login to share your posts!
                    </small>
                    <div>
                        <a href=\"{{ path('register') }}\" class=\"text-decoration-none me-3\">Register</a>
                        <a href=\"{{ path('app_login') }}\" class=\"text-decoration-none\">Login</a>
                    </div>
                    
                </div>
            {% endif %}
        </div>

{% endblock %}", "post/index.html.twig", "C:\\Users\\hiche\\OneDrive\\Bureau\\Symfony-Blog-main\\Symfony-Blog-main\\templates\\post\\index.html.twig");
    }
}
