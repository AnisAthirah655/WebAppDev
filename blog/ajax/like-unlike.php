<?php  

session_start();

if (isset($_SESSION['user_id']) && 
	isset($_SESSION['username']) &&
    isset($_POST['post_id'])) {
    
    include "../db_conn.php";
    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];

    if (empty($post_id)) {
        echo "Post ID is missing.";
    } else {
        // Check if the user has already liked this post
        $sql = "SELECT * FROM post_like WHERE post_id=? AND liked_by=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$post_id, $user_id]);
        
        if ($stmt->rowCount() > 0) {
            // Unlike the post (remove the like)
            $sql = "DELETE FROM post_like WHERE post_id=? AND liked_by=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$post_id, $user_id]);
            
            if ($res) {
                // Return the updated like count
                $sql = "SELECT COUNT(*) AS like_count FROM post_like WHERE post_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$post_id]);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                echo $data['like_count'];  // Return the updated like count
            } else {
                echo "Error unliking the post.";
            }
        } else {
            // Like the post (insert a new like)
            $sql = "INSERT INTO post_like (liked_by, post_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$user_id, $post_id]);
            
            if ($res) {
                // Return the updated like count
                $sql = "SELECT COUNT(*) AS like_count FROM post_like WHERE post_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$post_id]);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                echo $data['like_count'];  // Return the updated like count
            } else {
                echo "Error liking the post.";
            }
        }
    }
} else {
    echo "Invalid request.";
}
