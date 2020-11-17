<h1 class="center header">Web Hosting Canada - Developer Test</h1>

<div class="row">
    <div class="center alert alert alert-primary bs-alert-old-docs center-div">
        The implemented commands are : <strong>add, sort-asc and repo-desc.</strong>
    </div>
</div>
<div class="row">
    <div class="col-sm">
        <nav class="nav flex-column">
            <a class="nav-link btn-linkedin" href="https://www.linkedin.com/in/samuel-rio-a3b3b5102/"
               target="_blank">Linkedin : Samuel Rio</a>
            <a class="nav-link btn-vk" href="mailto:samuel.rio@epitech.eu">Email : samuel.rio@epitech.eu</a>
            <a class="nav-link btn-adn" href="tel:+33673201314">Phone: +33 673 20 13 14</a>
            <a class="nav-link btn-github" target="_blank" href="public/img/cv.pdf">CV</a>
        </nav>
    </div>
    <div class="col-sm">
        <form id="commandForm" class="blocktext center-div center">
            <div class="form-group">
                <label>Please write your command </label>
                <input type="text" name="command" class="form-control"
                       placeholder="Command arg1 arg2 arg3 argN"><br>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
    <div class="col-sm">
        <div class="p-4 mb-3 bg-light rounded guideline font-italic">
            <h4>Guidelines</h4>
            <p>add: adds numeric arguments.</p>
            <p>sort-asc: sort arguments in ascending order.</p>
            <p>repo-desc: perform a GitHub API call using owner and repo arguments to return a description of the
                repository. ex: repo-desc user repositoryName</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="center-div center" id="return"></div>
</div>