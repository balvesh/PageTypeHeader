# PageTypeHeader
 Magento 2 Module: Page Type Header Plugin to review requests on New Relic


# Tracking Cache Hits by Page Type 🔎 📊

Recently, I wanted a simple way to check the cache hit ratio for different pages—like product views or category pages—in our Adobe Commerce store using New Relic. Because each page has a unique URL, it was hard to group them by type.

I solved this by adding a custom header using a before plugin on `Magento\Framework\App\Response\Http`. Here’s a simple example:

`$subject->setHeader('X-Page-Type', $pageType);`

This extra header gets logged with each request, making it easier to filter and review cache performance for each page type.

## To set this up in Fastly, follow these steps:

1. Log in to the admin panel.
2. Go to Stores > Configuration.
3. Expand the "Advanced" section and click on "System".
4. Under the "Full Page Cache" section, expand "Fastly Configuration".
5. Go to "Tools > Real-Time Log Streaming".
6. Find the endpoint for New Relic Logs and edit it.
7. Add the field with your header, example:

`"page_type": "%{resp.http.x-page-type}V",`

8. Click "Update", then "Upload VCL to Fastly".

This small change makes it much easier to monitor cache hits by page type using New Relic in Adobe Commerce.
