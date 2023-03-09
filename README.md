# Плагин Меню

Возвращает только активные пункты меню

### /api/menus - получить весь список

```json
{
    "data": [
        {
            "title": "First",
            "description": null,
            "slug": "slug_first",
            "is_external": false,
            "link_target": "_self",
            "children": [
                {
                    "title": "First child",
                    "description": null,
                    "slug": "child_slug",
                    "is_external": false,
                    "link_target": "_self",
                    "children": []
                }
            ]
        }
    ],
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### /api/menus/{id} - получить конкретный список меню по ID

Например, необходимо получить только главное меню - /api/menus/1

```json
{
    "data": {
        "title": "First",
        "description": null,
        "slug": "slug_first",
        "is_external": false,
        "link_target": "_self",
        "children": [
            {
                "title": "First child",
                "description": null,
                "slug": "child_slug",
                "is_external": false,
                "link_target": "_self",
                "children": []
            }
        ]
    },
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```
