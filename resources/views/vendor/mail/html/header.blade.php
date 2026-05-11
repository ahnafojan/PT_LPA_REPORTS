@props(['url'])
<tr>
    <td align="center" style="padding: 24px 0;">
        <a href="{{ $url }}" style="display: inline-block; text-decoration: none;">
            <table cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                <tr>
                    <td style="vertical-align: middle; padding-right: 12px;">
                        <img
                            src="{{ asset('logo.png') }}"
                            alt="{{ config('app.name') }}"
                            width="64"
                            height="64"
                            style="width: 64px; height: 64px; border-radius: 50%; object-fit: contain; display: block;">
                    </td>
                    <td style="vertical-align: middle; width: 188px;">
                        <span style="display: block; white-space: nowrap; font-size: 30px; font-weight: 300; line-height: 1; letter-spacing: 2px; color: inherit; width: 188px;">
                            <strong style="font-weight: 900; letter-spacing: 0;">LUCKY</strong>TEX
                        </span>
                        <span style="display: block; margin-top: 4px; white-space: nowrap; font-size: 10px; font-weight: 300; text-transform: uppercase; letter-spacing: 0; color: inherit; width: 188px;">
                            LUCKY TEXTILE GROUP - SINCE 1970
                        </span>
                    </td>
                </tr>
            </table>
        </a>
    </td>
</tr>