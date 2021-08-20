<!-- Edit Module Modal -->
<div class="modal fade" id="editModule" tabindex="-1" role="dialog" aria-labelledby="newModuleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 editContentTitle" id="newCatgoryLabel">
                    Edit Module
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="module_title" id="" class="form-control">
                        <input type="hidden" name="sn" class="form-control ">
                    </div>

                    <div class="mb-3 mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="editModule" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Media Modal -->
<div class="modal fade" id="editContent" tabindex="-1" role="dialog" aria-labelledby="newModuleLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 editContentTitle" id="newCatgoryLabel">
                    Edit Content
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mb-3">
                        <label class="form-label">Title</label>



                        <input type="text" name="content_title" id="" class="form-control edit_topic_title">
                        <input type="hidden" name="sn" class="form-control edit_topic_id">
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Video URL</label>



                        <input type="url" name="video_url" id="" class="form-control edit_topic_video_url">
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Notes</label>

                        <textarea type="text" name="notes" class="form-control edit_topic_notes"></textarea>
                    </div>


                    <div class="mb-3 mb-3">
                        <label class="form-label">Resources</label>

                        <input type="url" name="resources" class="form-control edit_topic_res"></input>
                    </div>
                    <div>
                        <button type="submit" name="editContent" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Media Modal -->
<div class="modal fade" id="addContent" tabindex="-1" role="dialog" aria-labelledby="newModuleLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 contentTitle" id="newCatgoryLabel">
                    Add Content

                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mb-3">
                        <label class="form-label">Title</label>



                        <input type="text" name="content_title" id="" class="form-control edit_intro">
                        <input type="hidden" name="module_id" class="form-control add_content_topic_id">
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Video URL</label>



                        <input type="text" name="video_url" id="video_url" class="form-control edit_intro">


                        <input type="hidden" name="vimeo_embed_url" id="vimeo_embed_url" class="form-control edit_intro">

                        <input type="hidden" name="topic_id" class="form-control add_content_topic_id">
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Notes</label>

                        <textarea type="text" name="notes" id="notes" class="form-control edit_intro"></textarea>
                    </div>


                    <div class="mb-3 mb-3">
                        <label class="form-label">Resources</label>

                        <input type="url" name="resources" id="resources" class="form-control edit_intro"></input>
                        <input type="hidden" value="<?= $courseId ?>" name="sn" class="form-control edit_intro"></input>
                    </div>
                    <div>
                        <button type="submit" name="addContent" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Edit Media Modal -->
<div class="modal fade" id="editMedia" tabindex="-1" role="dialog" aria-labelledby="newModuleLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Edit Media
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mb-3">
                        <label class="form-label">Image</label>



                        <img class="img-fluid" src="../assets/images/course/<?= $intro['image_url'] ?>" alt=""><br><br>
                        Choose New Image
                        <input type="file" name="image" id="image" class="form-control edit_intro">
                        <input type="hidden" name="former_image" value='<?= $intro['image_url'] ?>'>
                        <input type="hidden" value="<?= $courseId ?>" name="sn" class="form-control edit_intro"></input>
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Video</label>

                        <input type="text" name="video_url" id="video_url" class="form-control edit_intro" value="<?= $intro['video_url'] ?>"></input>
                        <input type="hidden" value="<?= $courseId ?>" name="sn" class="form-control edit_intro"></input>
                    </div>
                    <div>
                        <button type="submit" name="editMedia" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Edit Prices Modal -->
<div class="modal fade" id="editPrice" tabindex="-1" role="dialog" aria-labelledby="newModuleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Edit Prices
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3 mb-3">
                        <label class="form-label">False Price</label>
                        <input type="number" name="false_price" id="false_price" class="form-control edit_intro" value="<?= $false_price ?>"></input>
                        <input type="hidden" value="<?= $courseId ?>" name="sn" class="form-control edit_intro"></input>
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control edit_intro" value="<?= $price ?>"></input>
                        <input type="hidden" value="<?= $courseId ?>" name="sn" class="form-control edit_intro"></input>
                    </div>
                    <div>
                        <button type="submit" name="editPrice" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<!-- Edit Intro Modal -->
<div class="modal fade" id="editIntro" tabindex="-1" role="dialog" aria-labelledby="newModuleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Edit Introduction
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3 mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="intro" id="intro" class="form-control edit_intro" rows="3"><?= $intro['body'] ?></textarea>
                        <input type="hidden" value="<?= $intro['sn'] ?>" name="sn" class="form-control edit_intro" rows="3"></input>
                    </div>
                    <div>
                        <button type="submit" name="editIntro" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- ADD FAQ Modal -->
<div class="modal fade" id="newFaq" tabindex="-1" role="dialog" aria-labelledby="newModuleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Add FAQ
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="title">Question</label>
                        <input type="text" name="question" class="form-control" placeholder="" id="title" required>
                        <input type="hidden" name="courseId" value="<?= $courseId; ?>">
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Answer</label>
                        <textarea name="answer" class="form-control" rows="3"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="addFaq" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Add MODULE Modal -->
<div class="modal fade" id="newModule" tabindex="-1" role="dialog" aria-labelledby="newModuleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Add Module
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="" id="title" required>
                        <input type="hidden" name="courseId" value="<?= $courseId; ?>">
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="addModule" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- ADD TOPIC MODAL -->
<!-- <div class="modal fade" id="newTopic" tabindex="-1" role="dialog" aria-labelledby="newTopicLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 newTopic_title" id="newTopicLabel">
                    Add Topic
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="" id="title" required>
                        <input type="hidden" name="moduleId" class="newTopic_module_id">
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="addTopic" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->