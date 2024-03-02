<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Drnxloc\LaravelHtmlDom\HtmlDomParser;



class GoogleSearchController extends Controller
{
    public function search(Request $request)
    {
        // Encode the search query
        $query = urlencode($request->input('q'));
    
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://www.google.com/search?q=$query");
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
        $result = curl_exec($curl);
    
        // Check for cURL errors
        if (curl_errno($curl)) {
            // Handle the error, for example, log it or return an error response
            $error_message = curl_error($curl);
            // Log or return the error message
            // For example: Log::error("cURL Error: $error_message");
            // Or: return response()->json(['error' => "cURL Error: $error_message"], 500);
        }
    
        // Close cURL session
        curl_close($curl);
    
        // Parse HTML using Simple HTML DOM
        $html = HtmlDomParser::str_get_html($result);
    
        // Get all links (href attributes of <a> tags)
        $links = [];
        foreach ($html->find('a[href^=/url?q=]') as $link) {
            // Replace "/url?q=" with an empty string
            $cleanedLink = str_replace("/url?q=", "", $link->href);
    
            // Parse the URL to get only the host (domain name)
            $parsedUrl = parse_url($cleanedLink);
            $domain = $parsedUrl['host'];
    
            $links[] = $domain;
        }
    
        // Clean up memory used by Simple HTML DOM
        $html->clear();
        unset($html);
    
        // Process the $links array or return it, depending on your needs
        return view('annuaire', compact('links'));
    }
    
    }

    
