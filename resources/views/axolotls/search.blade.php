<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find an Axolotl</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 3rem auto; max-width: 580px; padding: 0 1rem; color: #243047; }
        label { display: block; margin-bottom: .6rem; font-weight: bold; }
        .search-wrap { position: relative; }
        input { box-sizing: border-box; width: 100%; padding: .9rem; font-size: 1rem; border: 1px solid #8b98a9; border-radius: 8px; }
        ul { list-style: none; margin: .3rem 0 0; padding: 0; border: 1px solid #c7d0db; border-radius: 8px; box-shadow: 0 5px 14px #0001; }
        li button { display: block; width: 100%; padding: .8rem; border: 0; background: white; text-align: left; cursor: pointer; font: inherit; }
        li button:hover, li button:focus { background: #eaf4fc; }
        .hint { color: #5c6876; font-size: .9rem; }
    </style>
</head>
<body>
    <h1>Axolotl search</h1>
    <label for="axolotl-search">Search for an axolotl by name</label>
    <div class="search-wrap">
        <input id="axolotl-search" type="search" autocomplete="off" maxlength="60"
               placeholder="Try Bubbles" aria-controls="suggestions" aria-expanded="false">
        <ul id="suggestions" role="listbox" hidden></ul>
    </div>
    <p id="status" class="hint" aria-live="polite">Start typing to see suggestions.</p>

    <script>
        const input = document.getElementById('axolotl-search');
        const suggestions = document.getElementById('suggestions');
        const status = document.getElementById('status');
        const endpoint = '/axolotls/autocomplete';
        let timer;
        let controller;

        function clearSuggestions() {
            suggestions.replaceChildren();
            suggestions.hidden = true;
            input.setAttribute('aria-expanded', 'false');
        }

        input.addEventListener('input', () => {
            clearTimeout(timer);
            if (controller) controller.abort();
            clearSuggestions();
            const query = input.value.trim();
            if (!query) {
                status.textContent = 'Start typing to see suggestions.';
                return;
            }
            status.textContent = 'Searching...';
            timer = setTimeout(async () => {
                controller = new AbortController();
                try {
                    const response = await fetch(`${endpoint}?${new URLSearchParams({q: query})}`, {
                        signal: controller.signal,
                        headers: {'Accept': 'application/json'}
                    });
                    if (!response.ok) throw new Error('Search failed');
                    const matches = await response.json();
                    if (input.value.trim() !== query) return;
                    clearSuggestions();
                    if (matches.length === 0) {
                        status.textContent = 'No matching axolotls found.';
                        return;
                    }
                    matches.forEach(axolotl => {
                        const item = document.createElement('li');
                        item.setAttribute('role', 'option');
                        const button = document.createElement('button');
                        button.type = 'button';
                        button.textContent = `${axolotl.name} — ${axolotl.colour}, age ${axolotl.age}`;
                        button.addEventListener('click', () => {
                            input.value = axolotl.name;
                            clearSuggestions();
                            status.textContent = `Selected ${axolotl.name}.`;
                        });
                        item.appendChild(button);
                        suggestions.appendChild(item);
                    });
                    suggestions.hidden = false;
                    input.setAttribute('aria-expanded', 'true');
                    status.textContent = `${matches.length} suggestion(s) found.`;
                } catch (error) {
                    if (error.name !== 'AbortError') {
                        clearSuggestions();
                        status.textContent = 'Unable to load suggestions. Try again.';
                    }
                }
            }, 250);
        });

        document.addEventListener('click', event => {
            if (!event.target.closest('.search-wrap')) clearSuggestions();
        });
    </script>
</body>
</html>
