<?php
/**
 * Description: Displays Available Issues
 */
    $terms = get_terms( array(
        'taxonomy'      => 'issuem_issue',
        'hide_empty'    => false,
    ) );

    $num = 2;

    //shuffle( $terms );
    $issuem_issues = array_slice( $terms, 0, $num );

    foreach( $issuem_issues as $issue ) {
        $issue_meta = get_option( 'issuem_issue_' . $issue->term_id . '_meta' );



        echo '<h3><a href="' . get_term_link( $issue->term_id, 'issuem_issue' ) . '">' . $issue->name . '</a></h3>';
    }
