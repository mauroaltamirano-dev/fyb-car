# Repository instructions

## Selected architecture

Server-centric Laravel application with Blade and PostgreSQL for shared relational data.

## Working rules

- Use './bin/kit' as the stable operator interface; it delegates to 'scripts/project'.
- Recover context in this order: 'AGENTS.md', 'PROJECT_CONTEXT.md', 'ROADMAP.md', then files directly relevant to the task. Read 'DECISIONS.md' when rationale matters.
- Keep 'PROJECT_CONTEXT.md' concise and current, use 'ROADMAP.md' only for planned work, and record durable rationale in 'DECISIONS.md'.
- Run the strongest relevant verification through './bin/kit' before declaring work complete; do not claim checks that were not run.
- Never commit secrets. Keep configuration names and safe placeholders in '.env.example'; validate untrusted inputs and apply least privilege at application boundaries.
- Add services, persistence, authentication, storage, queues, or deployment infrastructure only when a documented product requirement justifies them.
