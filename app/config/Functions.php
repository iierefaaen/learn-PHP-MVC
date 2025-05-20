<?php

class Functions {
    public static function photo_handle_func( $file, $old_image = null ) {
        $allowed_ext = array("jpg","jpeg","png" );
        $max_file_size = 2 * 1024 * 1024; // 2 MB
        if ( isset($file["name"]) && $file["error"] === UPLOAD_ERR_OK) {
            $filename = $file["name"];
            $filesize = $file["size"];
            $file_temp = $file["tmp_name"];
            $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

            // check file extension
            if ( !in_array($file_ext, $allowed_ext) ) {
                // return "Extensi filke salah. extensi diterima: jpg, jpeg, png";
                return null;
            }

            // check file size
            if ( $filesize > $max_file_size) {
                // return "Ukuran file terlalu besar. Maksimla 2 MB.";
                return null;
            }

            // generate unique file name
            $uploaded_filename = "mhs_" . uniqid() . "." . $file_ext;

            // UPLOAD FILE
            $upload_path = LOCAL_PATH . "public/img/" . $uploaded_filename;
            if ( move_uploaded_file($file_temp, $upload_path) ) {
                return $uploaded_filename;
            } else {
                return null;
            }
        }


    // handle old file, if not upload new image on edit page
        if ( $old_image ) {
            return $old_image;
        }

        return null;
    }


    public static function print_alert_modal($title = "Pemberitahuan", $message = "", $type = "info"){
        $icons = [
            'success' => '✅',
            'error'   => '❌',
            'warning' => '⚠️',
            'info'    => 'ℹ️'
        ];

        $icon = $icons[$type] ?? 'ℹ️';

        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <div id="alertModal" class="modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header bg-' . $type . ' text-white">
                        <h5 class="modal-title">' . $title . '</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fw-bold">' . $icon . $message . '.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                const alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
                alertModal.show();

                //remove query string
                window.history.replaceState({}, document.title, window.location.pathname);
            </script>
            ';
    }


}