            @extends('layouts.admin')

            @section('title', 'Page Landing')

            @section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- 1. Jumbotron -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-image me-1"></i>
                    Jumbotron
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('jumbotron')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="jumbotronTitle" class="form-label">Title</label>
                        <input class="form-control" type="text" id="jumbotronTitle" value="Jumbotron Title">
                    </div>
                    <div class="mb-3">
                        <label for="jumbotronImage" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" id="jumbotronImage" onchange="previewImage(event, 'jumbotronPreview')">
                    </div>
                    <div id="jumbotronPreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <button type="button" class="btn btn-success" onclick="addJumbotron()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Jumbotron Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="jumbotron1" id="jumbotron1">
                    <label class="form-check-label" for="jumbotron1">Existing Jumbotron 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="jumbotron2" id="jumbotron2">
                    <label class="form-check-label" for="jumbotron2">Existing Jumbotron 2</label>
                </div>
            </div>
        </div>

        <!-- 2. About Us -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-info-circle me-1"></i>
                    About Us
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('about')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="aboutTitle" class="form-label">Title</label>
                        <input class="form-control" type="text" id="aboutTitle" value="About Us Title">
                    </div>
                    <div class="mb-3">
                        <label for="aboutImage" class="form-label">About Image</label>
                        <input class="form-control" type="file" id="aboutImage" onchange="previewImage(event, 'aboutPreview')">
                    </div>
                    <div id="aboutPreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <div class="mb-3">
                        <label for="aboutText" class="form-label">About Text</label>
                        <textarea class="form-control" id="aboutText" rows="3">About us description here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addAboutUs()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing About Us Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="about1" id="about1">
                    <label class="form-check-label" for="about1">Existing About Us 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="about2" id="about2">
                    <label class="form-check-label" for="about2">Existing About Us 2</label>
                </div>
            </div>
        </div>

        <!-- 3. Our Works -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-briefcase me-1"></i>
                    Our Works
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('work')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="workCategory" class="form-label">Category</label>
                        <select class="form-select" id="workCategory">
                            <option selected>Choose category...</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="workImage" class="form-label">Work Image</label>
                        <input class="form-control" type="file" id="workImage" onchange="previewImage(event, 'workPreview')">
                    </div>
                    <div id="workPreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <div class="mb-3">
                        <label for="workTitle" class="form-label">Work Title</label>
                        <input class="form-control" type="text" id="workTitle" value="Work Title Here">
                    </div>
                    <div class="mb-3">
                        <label for="workDescription" class="form-label">Work Description</label>
                        <textarea class="form-control" id="workDescription" rows="3">Description of the work here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addWork()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Work Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="work1" id="work1">
                    <label class="form-check-label" for="work1">Existing Work 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="work2" id="work2">
                    <label class="form-check-label" for="work2">Existing Work 2</label>
                </div>
            </div>
        </div>

        <!-- 4. Articles -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-newspaper me-1"></i>
                    Articles
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('article')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Title</label>
                        <input class="form-control" type="text" id="articleTitle" value="Article Title Here">
                    </div>
                    <div class="mb-3">
                        <label for="articleImage" class="form-label">Article Image</label>
                        <input class="form-control" type="file" id="articleImage" onchange="previewImage(event, 'articlePreview')">
                    </div>
                    <div id="articlePreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <div class="mb-3">
                        <label for="articleText" class="form-label">Article Text</label>
                        <textarea class="form-control" id="articleText" rows="3">Article description here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addArticle()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Article Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="article1" id="article1">
                    <label class="form-check-label" for="article1">Existing Article 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="article2" id="article2">
                    <label class="form-check-label" for="article2">Existing Article 2</label>
                </div>
            </div>
        </div>

        <!-- 5. Meet Our Teams -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-users me-1"></i>
                    Meet Our Teams
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('team')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="teamTitle" class="form-label">Team Title</label>
                        <input class="form-control" type="text" id="teamTitle" value="Team Title Here">
                    </div>
                    <div class="mb-3">
                        <label for="teamImage" class="form-label">Team Image</label>
                        <input class="form-control" type="file" id="teamImage" onchange="previewImage(event, 'teamPreview')">
                    </div>
                    <div id="teamPreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <div class="mb-3">
                        <label for="teamDescription" class="form-label">Team Description</label>
                        <textarea class="form-control" id="teamDescription" rows="3">Team description here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addTeam()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Team Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="team1" id="team1">
                    <label class="form-check-label" for="team1">Existing Team 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="team2" id="team2">
                    <label class="form-check-label" for="team2">Existing Team 2</label>
                </div>
            </div>
        </div>

        <!-- 6. Questions -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-question-circle me-1"></i>
                    Questions
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('question')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="questionTitle" class="form-label">Question Title</label>
                        <input class="form-control" type="text" id="questionTitle" value="Question Title">
                    </div>
                    <div class="mb-3">
                        <label for="questionAnswer" class="form-label">Answer</label>
                        <textarea class="form-control" id="questionAnswer" rows="3">Answer to the question here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addQuestion()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Question Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="question1" id="question1">
                    <label class="form-check-label" for="question1">Existing Question 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="question2" id="question2">
                    <label class="form-check-label" for="question2">Existing Question 2</label>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function previewImage(event, previewId) {
        const previewContainer = document.getElementById(previewId);
        const imgElement = previewContainer.querySelector('img');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imgElement.src = e.target.result;
                imgElement.style.display = 'block'; // Show the image
            }
            reader.readAsDataURL(file);
        } else {
            imgElement.src = '';
            imgElement.style.display = 'none'; // Hide the image
        }
    }

    function deleteSelected(section) {
        const checkboxes = document.querySelectorAll(`input[type="checkbox"][value^="${section}"]`);
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                // Logic for deleting selected items
                console.log(`Deleting ${checkbox.value}`);
                checkbox.closest('.form-check').remove(); // Remove the checkbox from the DOM
            }
        });
    }
</script>


            @endsection